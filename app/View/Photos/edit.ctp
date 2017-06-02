<div class="photos form">
<?php echo $this->Form->create('Photo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Photo'); ?></legend>
	<?php
		echo $this->Form->label('id');
		echo $this->request->data['Photo']['id'].'<br /><br />';
		echo $this->Form->label('insta_id');
		echo $this->request->data['Photo']['insta_id'].'<br /><br />';
		echo $this->Form->label('img_dir');
		echo $this->Html->image($this->request->data['Photo']['img_dir'], array('width'=>'320px','height'=>'auto')).'<br /><br />';
		echo $this->Form->label('insta_url');
		echo $this->request->data['Photo']['insta_url'].'<br /><br />';
		echo $this->Form->input('caption');
		echo $this->Form->input('tags');
		echo $this->Form->label('post_date');
		echo $this->request->data['Photo']['post_date'].'<br /><br />';
		echo $this->Form->input('show_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id' => $this->request->data['Photo']['id'])); ?>
</div>
