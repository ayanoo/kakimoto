	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php
		if ($this->name === 'Photos') {
			//echo '<li>'.$this->Html->link(__('New Photo'), array('controller'=> 'photos','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('Edit Photo'), array('controller'=> 'photos','action' => 'edit',$id)).'</li>';
			}
		}else if ($this->name === 'Staffs') {
			echo '<li>'.$this->Html->link(__('New Staff'), array('controller'=> 'staffs','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('Edit Staff'), array('controller'=> 'staffs','action' => 'edit',$id)).'</li>';
			}
		}else if ($this->name === 'Users') {
			echo '<li>'.$this->Html->link(__('New User'), array('controller'=> 'users','action' => 'add')).'</li>';
			if ($this->action === 'view') {
				echo '<li>'.$this->Html->link(__('Edit User'), array('controller'=> 'users','action' => 'edit',$id)).'</li>';
			}
		}
		?>
		<br />

		<li><?php echo $this->Html->link(__('Photos List'), array('controller'=> 'photos','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Staffs List'), array('controller'=> 'staffs','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Users List'), array('controller'=> 'users','action' => 'index')); ?></li>
		<br />
		<br />
		<br />
		<li><?php echo $this->Html->link(__('Log Out'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
