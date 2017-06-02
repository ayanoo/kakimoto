<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('hint');
		//echo $this->Form->input('store_id');
		echo $this->Form->input('store_id', array('type' => 'select',
											'options' => $stores,
											//'selected' => $this->Form->value('User.store_id')
											)
						);
		echo $this->Form->input('admin_flg');
		//echo $this->Form->input('del_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu'); ?>
</div>
