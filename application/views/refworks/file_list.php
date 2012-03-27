<?php echo form_open('refworks/insert'); ?>
<?php 
foreach ($files as $file){ 
	$data = array(
    'name'        => 'RefworksFile',
    'id'          => $file['name'],
    'value'       => $file['name'],
    'checked'     => TRUE
    );
	echo form_radio($data).$file['name'].'|'.$file['size'].'|'.$file['date'].'<br/>'; 
}
?>
<br/>
<?php echo form_submit('RefworksSubmit','Create Tasks');  ?>
<?php echo form_close(); ?>
