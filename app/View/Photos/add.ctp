<div class="photos form">
<?php echo $this->Form->create('Photo'); ?>
	<fieldset>
		<legend><?php echo __('Add Photo'); ?></legend>
	<?php
		echo $this->Form->input('insta_id');
		echo $this->Form->input('img_url');
		echo $this->Form->input('insta_url');
		echo $this->Form->input('caption');
		echo $this->Form->input('tags');
		echo $this->Form->input('post_date');
		echo $this->Form->input('show_flg');
		echo $this->Form->input('del_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu'); ?>
</div>
