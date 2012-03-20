<?php echo form_open('publishers/update'); ?>
<?php echo form_hidden('PubID', $publisher['PubID']); ?>
<?php echo 'Publisher Name'; ?>: 
<?php echo form_input('PubName', $publisher['PubName']); ?>
</br>
<?php echo 'Policy Link'; ?>: 
<?php echo form_input('PolicyLink', $publisher['PolicyLink']); ?>
</br>
<?php echo 'Policy Text'; ?>: 
<?php echo form_input('PolicyText', $publisher['PolicyText']); ?>
</br>
<?php echo 'What we can put up'; ?>: 
<?php echo form_input('what_we_can_put_up', $publisher['what_we_can_put_up']); ?>
</br>
<?php echo 'What we need to add'; ?>: 
<?php echo form_input('what_we_need_to_add', $publisher['what_we_need_to_add']); ?>
</br>
<?php echo 'embargo'; ?>: 
<?php echo form_input('embargo', $publisher['embargo']); ?>
</br>
<?php echo 'notes'; ?>: 
<?php echo form_textarea('notes', $publisher['notes']); ?>
</br>
<?php echo form_submit('PubSubmit','Save Publisher');  ?>
<?php echo form_close(); ?>
