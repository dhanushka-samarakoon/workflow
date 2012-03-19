<? echo form_open('publishers/insert'); ?>
<? echo 'Publisher Name'; ?>: 
<? echo form_input('PubName'); ?>
</br>
<? echo 'Policy Link'; ?>: 
<? echo form_input('PolicyLink'); ?>
</br>
<? echo 'Policy Text'; ?>: 
<? echo form_input('PolicyText'); ?>
</br>
<? echo 'What we can put up'; ?>: 
<? echo form_input('what_we_can_put_up'); ?>
</br>
<? echo 'What we need to add'; ?>: 
<? echo form_input('what_we_need_to_add'); ?>
</br>
<? echo 'embargo'; ?>: 
<? echo form_input('embargo'); ?>
</br>
<? echo 'notes'; ?>: 
<? echo form_textarea('notes'); ?>
</br>
<? echo form_submit('PubSubmit','Add Publisher');  ?>
<? echo form_close(); ?>
