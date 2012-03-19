<? echo form_open('publishers/insert'); ?>
<? echo form_hidden('PubID', $publisher['PubID']); ?>
<? echo 'Publisher Name'; ?>: 
<? echo form_input('PubName', $publisher['PubName']); ?>
</br>
<? echo 'Policy Link'; ?>: 
<? echo form_input('PolicyLink', $publisher['PolicyLink']); ?>
</br>
<? echo 'Policy Text'; ?>: 
<? echo form_input('PolicyText', $publisher['PolicyText']); ?>
</br>
<? echo 'What we can put up'; ?>: 
<? echo form_input('what_we_can_put_up', $publisher['what_we_can_put_up']); ?>
</br>
<? echo 'What we need to add'; ?>: 
<? echo form_input('what_we_need_to_add', $publisher['what_we_need_to_add']); ?>
</br>
<? echo 'embargo'; ?>: 
<? echo form_input('embargo', $publisher['embargo']); ?>
</br>
<? echo 'notes'; ?>: 
<? echo form_textarea('notes', $publisher['notes']); ?>
</br>
<? echo form_submit('PubSubmit','Save Publisher');  ?>
<? echo form_close(); ?>
