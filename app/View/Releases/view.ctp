<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Release');?></h2>
		<dl>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($release['Release']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Status'); ?></dt>
			<dd>
				<?php echo h($release['LuStatus']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Scheduled Date'); ?></dt>
			<dd>
				<?php $scheduledDate = date('m/d/Y', strtotime($release['Release']['scheduled_date'])); ?>
				<?php echo h($scheduledDate); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Version'); ?></dt>
			<dd>
				<?php echo h($release['Release']['version']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Environment'); ?></dt>
			<dd>
				<?php echo h($release['LuEnvironment']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('DB Changes'); ?></dt>
			<dd>
				<?php
					if ($release['Release']['db_changes']) {
						$dbChanges = 'Yes';
					} else {
						$dbChanges = 'No';
					}
					echo h($dbChanges); 
				?>
				&nbsp;
			</dd>
			<dt><?php echo __('DB Server'); ?></dt>
			<dd>
				<?php echo h($release['LuDbServer']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('DB Name'); ?></dt>
			<dd>
				<?php echo h($release['Release']['db_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Assigned To'); ?></dt>
			<dd>
				<?php echo h($release['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Trackers Included'); ?></dt>
			<dd>
				<?php echo h($release['Release']['trackers_included']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Notes'); ?></dt>
			<dd>
				<?php echo h($release['Release']['notes']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($release['Release']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($release['Release']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created By'); ?></dt>
			<dd>
				<?php echo h($release['CreatedBy']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified By'); ?></dt>
			<dd>
				<?php echo h($release['ModifiedBy']['username']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		
	</div>
</div>

