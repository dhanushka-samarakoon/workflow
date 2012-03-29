<div class="row">
	<div class="span8">
		<?php 
			$attributes = array('class' => 'form-horizontal well', 'id' => 'edit-pub');
			echo form_open('tasks/update', $attributes); 
		?>
		<?php echo form_hidden('TaskID', $task['TaskID']); ?>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Title',
				  'id'          => 'Title',
				  'value'       => $task['Title'],
				  'style'       => 'width:90%',
				  'rows'        => '3'
				);
			?>
			<label class="control-label" for="Title"><?php echo 'Title'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Author',
				  'id'          => 'Author',
				  'value'       => $task['Author'],
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="Author"><?php echo 'KSU Contact'; ?></label> 
			<div class="controls"><?php echo form_input($data); ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Publishers"><?php echo 'Publishers'; ?></label>
			<div class="controls"><?php echo form_dropdown('Publishers', $publishers, $task['PubID'], 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Status"><?php echo 'Status'; ?></label>
			<div class="controls"><?php echo form_dropdown('Status', $Status, $task['StatusID'], 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="Users"><?php echo 'Assigned User'; ?></label> 
			<div class="controls"><?php echo form_dropdown('Users', $Users, $task['UserID'], 'style=width:90%') ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'Notes',
				  'id'          => 'Notes',
				  'value'       => $task['Notes'],
				  'style'       => 'width:90%',
				  'rows'        => '4'
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
				  'value'       => $task['FileNames'],
				  'style'       => 'width:90%',
				  'rows'        => '3'
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
	<div class="span4 well">
		<?php if($task['KSUAuthors']!=''):?>
			<strong>KSU Authors</strong>
			<ul>
			<?php 
				$authors = explode(';', $task['KSUAuthors']); 
				foreach ($authors as $author){
					echo '<li>'.$author.'</li>';
				}
			?>
			</ul><hr/>
		<?php endif ?>
		<dl class="dl-horizontal">
			<?php
				foreach($metadata->result_array() as $item){
					echo '<dt>'.$item['MetaDataName'].'</dt>';
					echo '<dd>'.$item['MetaDataValue'].'</dd>';
				}
			?>
		</dl>
	</div>
</div>