<div class="row-fluid">
	<div class="span12">
		<h2><?php echo __('Edit %s', __('Release')); ?></h2>
	</div>
</div>	

<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Html->link('Back to Releases', array('action' => 'index'), array('class'=> 'btn btn-mini'));?>	</div>
</div>	

<?php echo $this->BootstrapForm->create('Release', array('inputDefaults' => array(
	'label' => false,
	'div' => false
)
));?>
<div class="row-fluid">
	<div class="span12">
				<?php
				echo $this->BootstrapForm->input('name', array(
					'placeholder' => 'Name',
					'before' => '<label>Name</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('lu_status_id', array(
					'before' => '<label>Status</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('lu_environment_id', array(
					'before' => '<label>Environment</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('scheduled_date', array(
					'before' => '<label>Scheduled Date</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('db_changes', array(
					'before' => '<label>DB Changes?</label')
				);
				echo $this->BootstrapForm->input('lu_db_server_id', array(
					'before' => '<label>DB Server</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('db_name', array(
					'placeholder' => 'Database Name',
					'before' => '<label>DB Name</label>')
				);
				echo $this->BootstrapForm->input('version', array(
					'placeholder' => 'Version',
					'before' => '<label>Version</label>')
				);
				echo $this->BootstrapForm->input('user_id', array(
					'before' => '<label>Assigned To</label>',
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('trackers_included', array(
					'placeholder' => 'Trackers Included',
					'before' => '<label>Trackers Included</label>')
				);
				echo $this->BootstrapForm->input('notes', array(
					'placeholder' => 'Notes',
					'before' => '<label>Notes</label>')
				);
				echo $this->BootstrapForm->hidden('id');
				?>
	</div>
</div>

<div class="row-fluid">
	<div class="span10">
						<?php echo $this->BootstrapForm->submit(__('Submit'));?>
		
	</div>
	<div class="span2">
						<div class="btn-group">
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')),  
					array('class'=> 'btn btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
				</div>
	</div>
</div>
<?php echo $this->BootstrapForm->end();?>
