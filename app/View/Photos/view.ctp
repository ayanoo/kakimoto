<div class="photos view">
<h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Insta_Id'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['insta_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img_dir'); ?></dt>
		<dd>
			<?php 
			echo $this->Html->image($photo['Photo']['img_dir'], array('width'=>'320px','height'=>'auto')).'<br /><br />';
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Insta Url'); ?></dt>
		<dd>
			<a href="<?php echo h($photo['Photo']['insta_url']); ?>"  target="_blank">
			<?php echo h($photo['Photo']['insta_url']); ?>
			</a>
			&nbsp;
		</dd>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Date'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['post_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show Flg'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['show_flg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Del Flg'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['del_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id' => $photo['Photo']['id'])); ?>
</div>
