<div class="staffs form">
<?php echo $this->Form->create('Staff', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Staff'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('name',array('label' => '担当者名'));
		echo $this->Form->input('name_kana',array('label' => '担当者名（ふりがな）'));
		echo $this->Form->input('english_name',array('label' => '担当者名（英語）'));
		echo $this->Form->input('stars',array('label' => '★'));
		echo $this->Form->input('tag_name',array('label' => 'ハッシュタグ'));
		echo $this->Form->input('job_id', array('label' => '役割',
											'type' => 'select',
											'options' => $jobs,
											'selected' => $this->Form->value('Staff.job_id')
											)
						);
		echo $this->Form->input('title',array('label' => '役職'));
		echo $this->Form->input('store_id', array('label' => '店舗名',
											'type' => 'select',
											'options' => $stores,
											'selected' => $this->Form->value('Staff.store_id')
											)
						);
		echo $this->Form->input('sort',array('label' => '表示優先度'));
		echo $this->Form->input('reserve_url',array('label' => '予約URL'));
		echo $this->Html->image($this->Form->value('Staff.picture'), array('width'=>'200px','height'=>'auto'));
		echo $this->Form->hidden('picture');
		
		echo $this->Form->input('picture', array('label' => '写真', 'type' => 'file', 'multiple'));
		echo $this->Form->input('profile',array('label' => 'プロフィール'));
		echo $this->Form->input('schedule' , array(
								'label' => 'スケジュール',
    							'type' => 'select' ,
    							'multiple' => 'checkbox',
    							'options' =>  array('0'=>'日','1' => '月', '2' => '火', '3'=>'水', '4' => '木', '5'=>'金', '6'=>'土'),
    							'selected' => explode(',', $this->Form->value('Staff.schedule')),
    							'div' => false,
								));
		echo $this->Form->input('memo',array('label' => '備考'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id'=> $this->request->data['Staff']['id'] )); ?>
</div>
