<div class="photos form">
<?php echo $this->Form->create('Photo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Photo'); ?></legend>
	<?php
		echo $this->Form->label('ID');
		echo $this->request->data['Photo']['id'].'<br /><br />';
		echo $this->Form->hidden('id');
		echo $this->Form->label('Instagram ID');
		echo $this->request->data['Photo']['insta_id'].'<br /><br />';
		echo $this->Form->label('写真');
		echo $this->Html->image($this->request->data['Photo']['img_dir'], array('label' => '写真','width'=>'320px','height'=>'auto')).'<br /><br />';
		echo $this->Form->label('Instagram URL');
		echo $this->request->data['Photo']['insta_url'].'<br /><br />';
		echo $this->Form->input('caption',array('label' => 'コメント'));
		echo $this->Form->input('tags',array('label' => 'ハッシュタグ'));
		echo $this->Form->label('投稿日時');
		echo $this->request->data['Photo']['post_date'].'<br /><br />';
		echo $this->Form->input('show_flg', array('label' => '表示/非表示',
											'type' => 'select',
											'options' => array('0' => '非表示','1' => '表示'),
											'selected' => $this->Form->value('Photo.show_flg')
											)
						);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id' => $this->request->data['Photo']['id'])); ?>
</div>
