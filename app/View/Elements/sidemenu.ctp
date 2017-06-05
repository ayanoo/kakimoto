	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php
		if ($this->name === 'Photos') {
			//echo '<li>'.$this->Html->link(__('New Photo'), array('controller'=> 'photos','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('写真情報編集'), array('controller'=> 'photos','action' => 'edit',$id)).'</li>';
			}
		}else if ($this->name === 'Staffs') {
			echo '<li>'.$this->Html->link(__('新規スタッフ登録'), array('controller'=> 'staffs','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('スタッフ情報編集'), array('controller'=> 'staffs','action' => 'edit',$id)).'</li>';
			}
		}else if ($this->name === 'Users') {
			echo '<li>'.$this->Html->link(__('新規ユーザー登録'), array('controller'=> 'users','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('ユーザー情報編集'), array('controller'=> 'users','action' => 'edit',$id)).'</li>';
			}
		}
		?>
	</ul>
	<br />
	<h3><?php echo __('List'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('写真一覧'), array('controller'=> 'photos','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('スタッフ一覧'), array('controller'=> 'staffs','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('ユーザー一覧'), array('controller'=> 'users','action' => 'index')); ?></li>
		<br />
		<br />
		<br />
		<li><?php echo $this->Html->link(__('Log Out'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
