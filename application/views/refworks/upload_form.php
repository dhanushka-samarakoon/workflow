<?php echo $message;?>

<?php echo form_open_multipart('refworks/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

<?php echo form_close(); ?>
