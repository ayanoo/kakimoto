<div class="photos index">
	<h2><?php echo __('Photos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('写真'); ?></th>
			<th><?php echo $this->Paginator->sort('コメント'); ?></th>
			<th><?php echo $this->Paginator->sort('ハッシュタグ'); ?></th>
			<th><?php echo $this->Paginator->sort('投稿日時'); ?></th>
			<th><?php echo $this->Paginator->sort('表示'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($photos as $photo): ?>
	<tr>
		<td><?php echo h($photo['Photo']['id']); ?>&nbsp;</td>
		<td><a href="<?php echo h($photo['Photo']['insta_url']); ?>" target="_blank">
				<?php echo $this->Html->image($photo['Photo']['img_dir'], array('width'=>'320px','height'=>'auto'));?>

			</a>
		</td>
		<td><?php echo h($photo['Photo']['caption']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['tags']); ?>&nbsp;</td>
		<td><?php echo h($photo['Photo']['post_date']); ?>&nbsp;</td>
		<td>
			<?php 
			if ($photo['Photo']['show_flg'] === '1') {
				echo '表示';
			} else {
				echo '非表示';
			}
			?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $photo['Photo']['id'])); ?>
			<br /><br />
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photo['Photo']['id'])); ?>
			<br /><br />
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $photo['Photo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $photo['Photo']['id']))); ?>
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
	<?php echo $this->element('sidemenu',array('id' => $photo['Photo']['id'])); ?>
</div>
