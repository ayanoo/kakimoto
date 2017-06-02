<?php
App::uses('AppModel', 'Model');
/**
 * Staff Model
 *
 */
class Staff extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array( 'SoftDelete' );

/**
 * SoftdeletedBehaviorを使用する際に、論理削除されてしまう現象を
 * 回避するために、このfunctionを追加。
 *
 * @var array
 */
	public function exists($id = null) {
        if ($this->Behaviors->loaded('SoftDelete')) {
            return $this->existsAndNotDeleted($id);
        } else {
            return parent::exists($id);
        }
	}



/**
 * Validation rules
 *
 * @var array
 */
 	public $validate = array(
		'id' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'picture' => array(

        		// ルール：uploadError => errorを検証 (2.2 以降)
        		'upload-file' => array( 
            		'rule' => array( 'uploadError'),
            		'message' => array( 'Error uploading file'),
   					 'allowEmpty' => true,
        		),

        		// ルール：extension => pathinfoを使用して拡張子を検証
        		'extension' => array(
            		'rule' => array( 'extension', array( 
                		'jpg', 'jpeg', 'png', 'gif')  // 拡張子を配列で定義
            		),
            		'message' => array( 'file extension error'),
            		'alllowEmpty' => true
        		),

        		// ルール：mimeType => 
        		// finfo_file(もしくは、mime_content_type)でファイルのmimeを検証 (2.2 以降)
        		// 2.5 以降 - MIMEタイプを正規表現(文字列)で設定可能に
        		//'mimetype' => array( 
            	//	'rule' => array( 'mimeType', array( 
                //		'image/jpeg', 'image/png', 'image/gif')  // MIMEタイプを配列で定義
            	//	),
            	//	'message' => array( 'MIME type error'),
            	//	'alllowEmpty' => true
        		//),

        		// ルール：fileSize => filesizeでファイルサイズを検証(2GBまで)  (2.3 以降)
        		//'size' => array(
            	//	'maxFileSize' => array( 
                //		'rule' => array( 'fileSize', '<=', '10MB'),  // 10M以下
                //		'message' => array( 'file size error')
            	//	),
            		//'minFileSize' => array( 
                	//	'rule' => array( 'fileSize', '>',  0),    // 0バイトより大
                	//	'message' => array( 'file size error')
            		//),
    			//),
    	),
    
	/*
	   		'picture'=>array(
      		'rule1' => array(
         		//拡張子の指定
         		'rule' => array('extension',array('jpg','jpeg','png')),
         		'message' => '画像ではありません。',
         		'allowEmpty' => true,
      		),
      		//'rule2' => array(
         		//画像サイズの制限
         		//'rule' => array('fileSize', '<=', '50000000'),
         		//'message' => '画像サイズは5MB以下でお願いします',
      		//)
   		),
	 * 
	 */
	);


    var $belongsTo = array('Store' =>
                            array('className' => 'Store',
                                  'foreignKey' => 'store_id'
                                  ),
							'Job' => 
							array('className' => 'Job',
								  'foreignKey' => 'job_id')
							);
	// 解除
	public function unsetVal() {
  
		unset($this->validate['picture']);
  
	}


}
