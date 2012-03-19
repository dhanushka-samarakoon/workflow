<? echo form_open('tasks/update'); ?>
<? echo form_hidden('TaskID', $task['TaskID']); ?>
<? echo 'Title'; ?>: 
<? echo form_input('Title', $task['Title']); ?>
</br>
<? echo 'Author'; ?>: 
<? echo form_input('Author', $task['Author']); ?>
</br>
<? echo 'KSUAuthors'; ?>: 
<? echo form_input('KSUAuthors', $task['KSUAuthors']); ?>
</br>
<? echo 'PubID'; ?>: 
<? echo form_input('PubID', $task['PubID']); ?>
</br>
<? echo 'Publishers'; ?>: 
<? echo form_dropdown('Publishers', $publishers, $task['PubID']) ?>
</br>
<? echo 'StatusID'; ?>: 
<? echo form_input('StatusID', $task['StatusID']); ?>
</br>
<? echo 'UserID'; ?>: 
<? echo form_input('UserID', $task['UserID']); ?>
</br>
<? echo 'Notes'; ?>: 
<? echo form_textarea('Notes', $task['Notes']); ?>
</br>
<? echo 'FileNames'; ?>: 
<? echo form_textarea('FileNames', $task['FileNames']); ?>
</br>
<? echo 'LastUpdatedDate'; ?>: 
<? echo form_input('LastUpdatedDate', $task['LastUpdatedDate']); ?>
</br>
<? echo 'CreatedDate'; ?>: 
<? echo form_input('CreatedDate', $task['CreatedDate']); ?>
</br>
<? echo form_submit('TaskSubmit','Save task');  ?>
<? echo form_close(); ?>
