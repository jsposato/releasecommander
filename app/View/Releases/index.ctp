<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Releases'));?></h2>
		<div class="span12">
			<div class="span2 offset8">
				<?php echo $this->Html->link(__('Add New Release'), array('action'=>'add'), array('class'=> 'btn btn-success')); ?>
			</div>
		</div>
		<!-- <p>
			<?php //echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>
		-->
		<br /><br />
		<table class="table">
			<tr>
				<!--<th><?php //echo $this->BootstrapPaginator->sort('id');?></th>-->
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('Environment');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('Status');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('scheduled_date');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('Assigned To');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php if(is_array($releases)) { ?>	
			<?php foreach ($releases as $release): ?>
				<tr>
					<!--<td><?php //echo h($release['Release']['id']); ?>&nbsp;</td>-->
					<td><?php echo h($release['Release']['name']); ?>&nbsp;</td>
					<td><?php echo h($release['LuEnvironment']['name']); ?>&nbsp;</td>
					<td><?php echo h($release['LuStatus']['name']); ?>&nbsp;</td>
					<td><?php echo h($release['Release']['scheduled_date']); ?>&nbsp;</td>
					<td><?php echo h($release['User']['username']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), 
													array(
														'action' => 'view', $release['Release']['id']), array(
																											'class'=>'btn btn-small btn-success')); ?>
						<?php echo $this->Html->link(__('Edit'), 
													array(
														'action' => 'edit', $release['Release']['id']), array(
																											'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Form->postLink(__('Mark Done'), 
													array(
														'action' => 'markDone', $release['Release']['id']), array(
																											'class'=>'btn btn-small btn-danger')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php } ?>
		</table>
		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>