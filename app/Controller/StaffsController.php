<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class StaffsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Staff','Job', 'Store');
 	public $components = array('Paginator', 'Session', 'Flash');
	public $helpers    = array('Common');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$jobs = $this->Job->find( 'list',
					array('fields' => array( 'id', 'name'))
				);
		
		$stores =  $this->Store->find( 'list',
						array('fields' => array( 'id', 'name'))
					);

		$this->Staff->recursive = 0;
		$this->set('staffs', $this->Paginator->paginate());
		
		$this->set(compact('jobs','stores'));
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$jobs = $this->Job->find( 'list',
					array('fields' => array( 'id', 'name'))
				);
		
		$stores =  $this->Store->find( 'list',
						array('fields' => array( 'id', 'name'))
					);

		if ($this->request->is('post')) {
			$this->Staff->create();
			
			// Scheduleをカンマ区切りでセットする
			if (!empty($this->request->data['Staff']['schedule'])) {
            	// 配列をカンマ区切りへ変換
            	$this->request->data['Staff']['schedule'] = implode(',', $this->request->data['Staff']['schedule']);
        	}
			
			// ファイルが存在した場合、ファイルを移動
			if (!empty($this->request->data['Staff']['picture'])) {
				
				// 画像の設置場所
				$path = '/staff_pic/'.date('YmdHis');
        		
				// 画像の設置ディレクトリがなければ作成
        		if(!file_exists("../webroot".$path)){
            		if (!mkdir("../webroot/".$path, 0777)) {
                		$this->Flash->error(__('ディレクトリが作成できません。'));
           		 	}
				}

      			$image = $this->request->data['Staff']['picture'];
	  			move_uploaded_file($image['tmp_name'], '../webroot'.$path . DS . $image['name']);
            	$this->request->data['Staff']['picture'] = $path . DS . $image['name'];
        	}

			// 作成日時をセット
			$this->request->data['Staff']['created'] = date('Y-m-d H:i:s',strtotime('now'));
			
			if ($this->Staff->save($this->request->data)) {
				$this->Flash->success(__('The staff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The staff could not be saved. Please, try again.'));
			}
		}
		
		$this->set(compact('jobs','stores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set( 'jobs', $this->Job->find( 'list', array( 
    				'fields' => array( 'id', 'name')
					)));

		$this->set( 'stores', $this->Store->find( 'list', array( 
    				'fields' => array( 'id', 'name')
					)));

		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (!empty($this->request->data['Staff']['schedule'])) {
            	// 保存前に配列をカンマ区切りへ変換
            	$this->request->data['Staff']['schedule'] = implode(',', $this->request->data['Staff']['schedule']);
        	}

			$image = $this->request->data['Staff']['picture'];
			// 新画像がセットされている場合は、新画像に差し替え
			if (is_uploaded_file($image['tmp_name'])) {
				
				$path = '/staff_pic/'.date('YmdHis');
      			
        		if(!file_exists( '../webroot'.$path)){
            		if (!mkdir( '../webroot'.$path, 0777)) {
						$this->Flash->error(__('ディレクトリが作成できません。'));
            		}
				}

	  			move_uploaded_file($image['tmp_name'], '../webroot'.$path . DS . $image['name']);
            	$this->request->data['Staff']['picture'] = $path . DS . $image['name'];
			

				if ($this->Staff->save($this->request->data)) {
					$this->Flash->success(__('The staff has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					var_dump($this->request->data);
					$this->Flash->error(__('The staff could not be saved. Please, try again.'));
				}

				if ($this->Staff->save($this->request->data)) {
					$this->Flash->success(__('The staff has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					var_dump($this->request->data);
					$this->Flash->error(__('The staff could not be saved. Please, try again.'));
				}

        	}else{

        		// 新画像がセットされていない場合は、pictureは更新しない。
        		// バリデーション解除
				unset($this->Staff->validate['picture']);
				
        		//blacklistに載せて、update文にものせない。
				$blacklist = array('picture');

				if ($this->Staff->save($this->request->data,true,array_diff(array_keys($this-> Staff->schema()), $blacklist))) {
					$this->Flash->success(__('The staff has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					var_dump($this->request->data);
					$this->Flash->error(__('The staff could not be saved. Please, try again.'));
				}

        	}

		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Staff->delete($id) === false) {
			$this->Flash->success(__('The staff has been deleted.'));
		} else {
			$this->Flash->error(__('The staff could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

