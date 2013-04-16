<script type="text/javascript">
    $(function () {
        $("#ReleaseScheduledDate").datepicker({
            dateFormat:"mm/dd/yy",
            changeMonth:true,
            changeYear:true,
            showButtonPanel:true,
            yearRange:"-110y:+0y",
            defaultDate:new Date()
        })
    });
</script>

<div class="row-fluid">
	<div class="span12">
		<h2><?php echo __('New %s', __('Release')); ?></h2>
	</div>
</div>	

<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Html->link('Back to Releases', array('action' => 'index'), array('class'=> 'btn btn-mini'));?>
	</div>
</div>	

<?php echo $this->BootstrapForm->create('Release', array('inputDefaults' => array(
	'label' => false,
	'div' => false
)
));?>
<div class="row-fluid">
	<div class="span4">
				<?php
				echo $this->BootstrapForm->input('name', array(
					'required' => 'required',
					'placeholder' => 'Name',
					'helpInline' => '<span class="label label-important">' . __('*') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('lu_status', array(
					'required' => 'required',
					'label' => 'Status',
					'helpInline' => '<span class="label label-important">' . __('*') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('scheduled_date', array(
		            'type' => 'text',
		            'placeholder' => '',
		            'empty' => true,
		            'label' => 'Release Date',
		            'allowEmpty' => false,
		            'dateFormat' => 'YMD',
		            'required' => 'required',
		            'helpInline' => '<span class="label label-important">' . __('*') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('version', array(
					'placeholder' => 'Version',
					'helpInLine' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);
				?>
	</div>
	<div class="span4">
		<?php
				echo $this->BootstrapForm->input('db_changes', array(
					'label' => 'DB Changes?',
					'helpInLine' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('lu_db_server', array(
					'label' => 'DB Server',
					'helpInline' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('db_name', array(
					'placeholder' => 'DB Name',
					'helpInLine' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);				
				echo $this->BootstrapForm->input('lu_environment', array(
					'required' => 'required',
					'label' => 'Environment',
					'helpInline' => '<span class="label label-important">' . __('*') . '</span>&nbsp;')
				);
		?>
	</div>
	<div class="span4">
		<?php
				echo $this->BootstrapForm->input('user_id', array(
					'required' => 'required',
					'label' => 'Assigned To',
					'helpInline' => '<span class="label label-important">' . __('*') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('trackers_included', array(
					'placeholder' => 'Stories Included',
					'helpInLine' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('notes', array(
					'placeholder' => 'Notes',
					'helpInLine' => '<span class="label label-important">' . __('') . '</span>&nbsp;')
				);
		?>
	</div>
</div>

<div class="row-fluid">
	<div class="span10">
						<?php echo $this->BootstrapForm->submit(__('Submit'));?>
		
	</div>
	<div class="span2">
			</div>
</div>
<?php echo $this->BootstrapForm->end();?>
