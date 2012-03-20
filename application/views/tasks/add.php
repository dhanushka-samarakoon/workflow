<? echo form_open('tasks/insert'); ?>
<? echo 'Title'; ?>: 
<? echo form_input('Title'); ?>
</br>
<? echo 'Author'; ?>: 
<? echo form_input('Author'); ?>
</br>
<? echo 'KSUAuthors'; ?>: 
<? echo form_input('KSUAuthors'); ?>
</br>
<? echo 'PubID'; ?>: 
<? echo form_input('PubID'); ?>
</br>
<? echo 'Publishers'; ?>: 
<? echo form_dropdown('Publishers', $publishers) ?>
</br>
<? echo 'StatusID'; ?>: 
<? echo form_input('StatusID'); ?>
</br>
<? echo 'UserID'; ?>: 
<? echo form_input('UserID'); ?>
</br>
<? echo 'Notes'; ?>: 
<? echo form_textarea('Notes'); ?>
</br>
<? echo 'FileNames'; ?>: 
<? echo form_textarea('FileNames'); ?>
</br>
<? echo 'LastUpdatedDate'; ?>: 
<? echo form_input('LastUpdatedDate'); ?>
</br>
<? echo 'CreatedDate'; ?>: 
<? echo form_input('CreatedDate'); ?>
</br>
<? echo form_submit('TaskSubmit','Save task');  ?>
<? echo form_close(); ?>
