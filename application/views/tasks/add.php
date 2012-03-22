<?php echo form_open('tasks/insert'); ?>
<?php echo 'Title'; ?>: 
<?php echo form_input('Title'); ?>
</br>
<?php echo 'Author'; ?>: 
<?php echo form_input('Author'); ?>
</br>
<?php echo 'KSUAuthors'; ?>: 
<?php echo form_input('KSUAuthors'); ?>
</br>
<?php echo 'Publishers'; ?>: 
<?php echo form_dropdown('Publishers', $Publishers) ?>
</br>
<?php echo 'Status'; ?>: 
<?php echo form_dropdown('Status', $Status) ?>
</br>
<?php echo 'Assigned User'; ?>: 
<?php echo form_dropdown('Users', $Users) ?>
</br>
<?php echo 'Notes'; ?>: 
<?php echo form_textarea('Notes'); ?>
</br>
<?php echo 'FileNames'; ?>: 
<?php echo form_textarea('FileNames'); ?>
</br>
<?php echo 'LastUpdatedDate'; ?>: 
<?php echo form_input('LastUpdatedDate'); ?>
</br>
<?php echo 'CreatedDate'; ?>: 
<?php echo form_input('CreatedDate'); ?>
</br>
<?php echo form_submit('TaskSubmit','Save task');  ?>
<?php echo form_close(); ?>
