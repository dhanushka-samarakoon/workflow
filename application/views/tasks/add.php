<div class="row">
	<div class="span8 offset2">
		<?php 
			$attributes = array('class' => 'form-horizontal well', 'id' => 'add-pub');
			echo form_open('tasks/insert', $attributes); 
		?>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Title',
				  'id'          => 'Title',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="Title"><?php echo 'Title'; ?></label>
			<div class="controls"><?php echo form_input($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Author',
				  'id'          => 'Author',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="Title"><?php echo 'Author'; ?></label> 
			<div class="controls"><?php echo form_input($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'KSUAuthors',
				  'id'          => 'KSUAuthors',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="KSUAuthors"><?php echo 'KSUAuthors'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Publishers"><?php echo 'Publishers'; ?></label>
			<div class="controls"><?php echo form_dropdown('Publishers', $Publishers, null, 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Status"><?php echo 'Status'; ?></label>
			<div class="controls"><?php echo form_dropdown('Status', $Status, null, 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Users"><?php echo 'Assigned User'; ?></label> 
			<div class="controls"><?php echo form_dropdown('Users', $Users, null, 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Notes',
				  'id'          => 'Notes',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="Notes"><?php echo 'Notes'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'FileNames',
				  'id'          => 'FileNames',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="FileNames"><?php echo 'FileNames'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		
		<?php
				$data = array(
				  'name'        => 'TaskSubmit',
				  'id'          => 'TaskSubmit',
				  'value'		=> 'Save Task',
				  'class'       => 'btn btn-success'
				);
			?>
		<?php echo form_submit($data);  ?>
		<?php echo form_close(); ?>
	</div>
</div>