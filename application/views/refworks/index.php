<div class="row">
	<div class="span6">
		<?php 
			$attributes = array('class' => 'well form-inline', 'id' => 'process-refworks');
			echo form_open('refworks/insert', $attributes); 
		?>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th></th>
					<th>File Name</th>
					<th>Size</th>
					<th>Uploaded Date/Time</th>
				</tr>
			</thead>
			
			<tbody>
			<?php 
			foreach ($files as $file){ 
				$data = array(
				'name'        => 'RefworksFile',
				'id'          => $file['name'],
				'value'       => $file['name'],
				'checked'     => TRUE
				);
				echo '<tr>';
				echo '<td>'.form_radio($data).'</td>';
				echo '<td>'.$file['name'].'</td>';
				echo '<td>'.$file['size'].'</td>';
				echo '<td>'.$file['date'].'</td>';
				echo '</tr>'; 
			}
			?>
			<br/>
			<?php echo form_submit('RefworksSubmit','Create Tasks');  ?>
			<?php echo form_close(); ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<?php 
			$attributes = array('class' => 'well form-inline', 'id' => 'upload-refworks');
			echo form_open_multipart('refworks/do_upload', $attributes);
		?>
		<input type="file" name="userfile" size="20" />
		<input type="submit" value="Upload File" class="btn btn-primary"/>
		<?php echo form_close(); ?>
		
		<?php 
		//print_r($feedback);
		foreach ($feedback as $fb){
			echo $fb['message'].' | '.$fb['message_type'].'<br/>';
		}
		?>
	</div>
</div>




