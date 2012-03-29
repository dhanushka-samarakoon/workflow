<?php echo form_open('users/insert'); ?>
<?php echo 'User Name'; ?>: 
<?php echo form_input('UserName'); ?>
<br/>
<?php echo 'User email'; ?>: 
<?php echo form_input('UserEmail'); ?>
</br>
<?php echo 'password'; ?>: 
<?php echo form_input('UserPass'); ?>
</br>
<?php echo form_submit('UsersSubmit','Add User');  ?>
<?php echo form_close(); ?>
