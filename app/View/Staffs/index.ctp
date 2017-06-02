<div class="staffs index">
	<h2><?php echo __('Staffs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('name_kana'); ?></th>
			<th><?php echo $this->Paginator->sort('english_name'); ?></th>
			<th><?php echo $this->Paginator->sort('stars'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_name'); ?></th>
			<th><?php echo $this->Paginator->sort('job'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('store'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th><?php echo $this->Paginator->sort('reserve_url'); ?></th>
			<th><?php echo $this->Paginator->sort('picture'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule'); ?></th>
			<th><?php echo $this->Paginator->sort('memo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($staffs as $staff): ?>
	<tr>
		<td><?php echo h($staff['Staff']['id']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['name_kana']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['english_name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['stars']); ?>&nbsp;</td>
		<td>#<?php echo h($staff['Staff']['tag_name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Job']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['title']); ?>&nbsp;</td>
		<td><?php echo h($staff['Store']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['sort']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['reserve_url']); ?>&nbsp;</td>
		<td><?php //echo h($staff['Staff']['picture']); ?>&nbsp;
			<?php 
			if ($staff['Staff']['picture']) {
				echo $this->Html->image($staff['Staff']['picture'], array('width'=>'200px','height'=>'auto'));
			}
			?>
		</td>
		<td>
			<?php //echo h($staff['Staff']['schedule']); ?>
			<?php echo $this->Common->getScheduleDay($staff['Staff']['schedule']); ?>&nbsp;
		</td>
		
		<td><?php echo h($staff['Staff']['memo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $staff['Staff']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staff['Staff']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $staff['Staff']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu'); ?>
</div>
