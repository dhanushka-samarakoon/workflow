<?php echo form_open('tasks/update'); ?>
<?php echo form_hidden('TaskID', $task['TaskID']); ?>
<?php echo 'Title'; ?>: 
<?php echo form_input('Title', $task['Title']); ?>
</br>
<?php echo 'Author'; ?>: 
<?php echo form_input('Author', $task['Author']); ?>
</br>
<?php echo 'KSUAuthors'; ?>: 
<?php echo form_input('KSUAuthors', $task['KSUAuthors']); ?>
</br>
<?php echo 'Publishers'; ?>: 
<?php echo form_dropdown('Publishers', $publishers, $task['PubID']) ?>
</br>
<?php echo 'Status'; ?>: 
<?php echo form_dropdown('Status', $Status, $task['StatusID']) ?>
</br>
<?php echo 'Assigned User'; ?>: 
<?php echo form_dropdown('Users', $Users, $task['UserID']) ?>
</br>
<?php echo 'Notes'; ?>: 
<?php echo form_textarea('Notes', $task['Notes']); ?>
</br>
<?php echo 'FileNames'; ?>: 
<?php echo form_textarea('FileNames', $task['FileNames']); ?>
</br>
<?php echo 'LastUpdatedDate'; ?>: 
<?php echo form_input('LastUpdatedDate', $task['LastUpdatedDate']); ?>
</br>
<?php echo 'CreatedDate'; ?>: 
<?php echo form_input('CreatedDate', $task['CreatedDate']); ?>
</br>
<?php echo form_submit('TaskSubmit','Save task');  ?>
<?php echo form_close(); ?>
