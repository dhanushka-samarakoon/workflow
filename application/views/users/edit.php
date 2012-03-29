<?php echo form_open('users/update'); ?>
<?php echo 'password'; ?>: 
<?php echo form_input('UserPass'); ?>
</br>
<?php echo form_submit('UsersSubmit','Change Password');  ?>
<?php echo form_close(); ?>
