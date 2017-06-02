<div class="staffs view">
<h2><?php echo __('Staff'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名前'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名前（ふりがな）'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['name_kana']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名前（英語）'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['english_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('★'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['stars']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ハッシュタグ'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['tag_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('役割'); ?></dt>
		<dd>
			<?php echo h($staff['Job']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('役職'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('店舗'); ?></dt>
		<dd>
			<?php echo h($staff['Store']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('予約URL'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['reserve_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('表示優先度'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['sort']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('写真'); ?></dt>
		<dd>
			<?php 
			echo $this->Html->image($staff['Staff']['picture'], array('width'=>'200px','height'=>'auto'));
			?>
			<?php //echo h($staff['Staff']['picture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('スケジュール'); ?></dt>
		<dd>
			<?php echo $this->Common->getScheduleDay($staff['Staff']['schedule']); ?>
			<?php //echo h($staff['Staff']['schedule']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('備考'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Update User'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['update_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Del Flg'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['del_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu', array('id' => $staff['Staff']['id'])); ?>
</div>
