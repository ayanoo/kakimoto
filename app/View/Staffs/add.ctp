<div class="staffs form">
<?php echo $this->Form->create('Staff', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Staff'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => '担当者名'));
		echo $this->Form->input('name_kana',array('label' => '担当者名（ふりがな）'));
		echo $this->Form->input('english_name',array('label' => '担当者名（英語）'));
		echo $this->Form->input('stars',array('label' => '★'));
		echo $this->Form->input('tag_name',array('label' => 'ハッシュタグ'));
		echo $this->Form->input('job_id',array('label' => '役割'));
		echo $this->Form->input('title',array('label' => '役職'));
		echo $this->Form->input('store_id',array('label' => '店舗名'));
		echo $this->Form->input('sort',array('label' => '表示優先度'));
		echo $this->Form->input('reserve_url',array('label' => '予約URL'));
		echo $this->Form->input('picture', array('label' => '写真', 'type' => 'file', 'multiple'));
		echo $this->Form->input('profile',array('label' => 'プロフィール'));
		echo $this->Form->input('schedule' , array(
								'label' => 'スケジュール',
    							'type' => 'select' ,
    							'multiple' => 'checkbox',
    							'options' =>  array('0'=>'日','1' => '月', '2' => '火', '3'=> '水', '4' => '木', '5'=>'金', '6'=> '土'),
    							'div' => false,
								));
		echo $this->Form->input('memo',array('label' => '備考'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu'); ?>
</div>
