<div class="staffs form">
<?php echo $this->Form->create('Staff', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Staff'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('name_kana');
		echo $this->Form->input('english_name');
		echo $this->Form->input('stars');
		echo $this->Form->input('tag_name');
		echo $this->Form->input('job_id', array('type' => 'select',
											'options' => $jobs,
											'selected' => $this->Form->value('Staff.job_id')
											)
						);
		echo $this->Form->input('title');
		echo $this->Form->input('store_id', array('type' => 'select',
											'options' => $stores,
											'selected' => $this->Form->value('Staff.store_id')
											)
						);
		echo $this->Form->input('reserve_url');
		//echo $this->Form->input('picture');
		echo $this->Html->image($this->Form->value('Staff.picture'), array('width'=>'200px','height'=>'auto'));
		echo $this->Form->hidden('picture');
		
		echo $this->Form->input('picture', array('label' => '写真', 'type' => 'file', 'multiple'));
		echo $this->Form->input('profile');
		echo $this->Form->input('schedule' , array(
    							'type' => 'select' ,
    							'multiple' => 'checkbox',
    							'options' =>  array('0'=>'日','1' => '月', '2' => '火', '3'=>'水', '4' => '木', '5'=>'金', '6'=>'土'),
    							'selected' => explode(',', $this->Form->value('Staff.schedule')),
    							'div' => false,
								));
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id'=> $this->request->data['Staff']['id'] )); ?>
</div>
