<div class="photos view">
<h2><?php echo __('Photo'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instagram ID'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['insta_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('写真'); ?></dt>
		<dd>
			<?php 
			echo $this->Html->image($photo['Photo']['img_dir'], array('width'=>'320px','height'=>'auto')).'<br /><br />';
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instagram URL'); ?></dt>
		<dd>
			<a href="<?php echo h($photo['Photo']['insta_url']); ?>"  target="_blank">
			<?php echo h($photo['Photo']['insta_url']); ?>
			</a>
			&nbsp;
		</dd>
		<dt><?php echo __('コメント'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ハッシュタグ'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('投稿日時'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['post_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('表示/非表示'); ?></dt>
		<dd>
			<?php 
			if ($photo['Photo']['show_flg'] === '1') {
				echo '表示'; 
			}else {
				echo '非表示';
			}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('作成日時'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('更新日時'); ?></dt>
		<dd>
			<?php echo h($photo['Photo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('sidemenu',array('id' => $photo['Photo']['id'])); ?>
</div>
