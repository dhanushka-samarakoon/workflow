<div class="row">
	<div class="span4 offset4">
	<br/><br/><br/><br/><br/><br/>
	<?php 
		$attributes = array('class' => 'form-horizontal well', 'id' => 'edit-pub');
		echo form_open('users/validate', $attributes); 
	?>
	<div class="control-group">
		<?php
			$data = array(
			  'name'        => 'UserName',
			  'id'          => 'UserName',
			  'style'       => 'width:90%'
			);
		?>
		<label class="control-label" for="UserName"><?php echo 'User Name'; ?></label>
		<div class="controls"><?php echo form_input($data); ?></div>
	</div>
	<div class="control-group">
		<?php
			$data = array(
			  'name'        => 'UserPass',
			  'id'          => 'UserPass',
			  'style'       => 'width:90%'
			);
		?>
		<label class="control-label" for="UserPass"><?php echo 'Password'; ?></label>
		<div class="controls"><?php echo form_password($data); ?></div>
	</div>

	<?php 
		$data = array(
			  'name'        => 'UsersSubmit',
			  'id'          => 'UsersSubmit',
			  'value'		=> 'Login',
			  'class'       => 'btn btn-info'
			);
		echo form_submit($data);  
	?>
	<?php echo form_close(); ?>
	</div>
</div>
