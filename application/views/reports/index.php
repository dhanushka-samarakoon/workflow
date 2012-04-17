<?php 
	$this->load->helper('url'); 
	$this->load->helper('form');
?>
<div class="row">
	<div class="span12">
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#startdate-picker').datepicker({
					inline: true,
					dateFormat: "yy-mm-dd",
					minDate: new Date(2011, 1 - 1, 01)
				});
				$('#enddate-picker').datepicker({
					inline: true,
					dateFormat: "yy-mm-dd",
					maxDate: "TODAY"
				});

			});
		</script>
		<?php 
			$attributes = array('class' => 'well form-inline', 'id' => 'process-refworks');
			echo form_open('reports/byDates', $attributes); 
		?>
		Start Date: <input type="text" id="startdate-picker" name="startDate"> &nbsp;
		End Date: <input type="text" id="enddate-picker" name="endDate"> &nbsp; &nbsp;
		<?php echo form_submit('ReportSubmit','Generate Report');  ?>
		<?php echo form_close(); ?>
		
		<?php 
		foreach ($feedback as $fb){
			echo '<div class="alert alert-'.$fb['message_type'].'">';
			echo $fb['message'];
			echo '</div>';
		}
		?>
	</div>
</div>

<div class="row">
	<div class="span6">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Tasks Created</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($tasks->result_array() as $task): ?>
			<tr>
				<td><?php echo $task['Month'] ?></td>
				<td><?php echo $task['Year'] ?></td>
				<td><?php echo $task['Total'] ?></td>
			</tr>
		<?php endforeach ?>
			</tbody>
		</table>
	</div>
	
	<div class="span6">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Tasks Closed</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($tasks_closed->result_array() as $task): ?>
			<tr>
				<td><?php echo $task['Month'] ?></td>
				<td><?php echo $task['Year'] ?></td>
				<td><?php echo $task['Total'] ?></td>
			</tr>
		<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
