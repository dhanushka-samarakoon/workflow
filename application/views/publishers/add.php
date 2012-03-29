<div class="row">
	<div class="span8 offset2">
		<?php 
			$attributes = array('class' => 'form-horizontal well', 'id' => 'edit-pub');
			echo form_open('publishers/insert', $attributes); 
		?>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'PubName',
				  'id'          => 'PubName',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="PubName"><?php echo 'Publisher Name'; ?></label>
			<div class="controls"><?php echo form_input($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'PolicyLink',
				  'id'          => 'PolicyLink',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="PolicyLink"><?php echo 'Policy Link'; ?></label> 
			<div class="controls"><?php echo form_input($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'PolicyText',
				  'id'          => 'PolicyText',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="PolicyText"><?php echo 'Policy Text'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'what_we_can_put_up',
				  'id'          => 'what_we_can_put_up',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="what_we_can_put_up"><?php echo 'What we can put up'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'what_we_need_to_add',
				  'id'          => 'what_we_need_to_add',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="what_we_need_to_add"><?php echo 'What we need to add'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'embargo',
				  'id'          => 'embargo',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="embargo"><?php echo 'Embargo'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		<div class="control-group">
			<?php
				$data = array(
				  'name'        => 'notes',
				  'id'          => 'notes',
				  'style'       => 'width:90%'
				);
			?>
			<label class="control-label" for="notes"><?php echo 'Notes'; ?></label>
			<div class="controls"><?php echo form_textarea($data); ?></div>
		</div>
		
		
		<?php
				$data = array(
				  'name'        => 'PubSubmit',
				  'id'          => 'PubSubmit',
				  'value'		=> 'Save Publisher',
				  'class'       => 'btn btn-success'
				);
			?>
		<?php echo form_submit($data);  ?>
		<?php echo form_close(); ?>
	</div>
</div>