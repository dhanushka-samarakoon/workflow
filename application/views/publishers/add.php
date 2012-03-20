<?php echo form_open('publishers/insert'); ?>
<?php echo 'Publisher Name'; ?>: 
<?php echo form_input('PubName'); ?>
</br>
<?php echo 'Policy Link'; ?>: 
<?php echo form_input('PolicyLink'); ?>
</br>
<?php echo 'Policy Text'; ?>: 
<?php echo form_input('PolicyText'); ?>
</br>
<?php echo 'What we can put up'; ?>: 
<?php echo form_input('what_we_can_put_up'); ?>
</br>
<?php echo 'What we need to add'; ?>: 
<?php echo form_input('what_we_need_to_add'); ?>
</br>
<?php echo 'embargo'; ?>: 
<?php echo form_input('embargo'); ?>
</br>
<?php echo 'notes'; ?>: 
<?php echo form_textarea('notes'); ?>
</br>
<?php echo form_submit('PubSubmit','Add Publisher');  ?>
<?php echo form_close(); ?>
