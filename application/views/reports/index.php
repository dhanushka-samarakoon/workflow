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
<?php //print_r($form_tasks_closed->result_array()) ?>
<div class="row">
	<div class="span3 well">
                <strong>Tasks created by Form</strong>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Tasks</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($form_tasks->result_array() as $task): ?>
			<tr>
				<td><?php echo $task['Month'] ?></td>
				<td><?php echo $task['Year'] ?></td>
				<td><?php echo $task['Total'] ?></td>
			</tr>
		<?php endforeach ?>
			</tbody>
		</table>
	</div>
	
	<div class="span8 well">
                <strong>Closed Tasks created by Form</strong>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Year-Month</th>
					<th>Deposited</th>
					<th>Denied</th>
                                        <th>No Manuscript</th>
                                        <th>Other</th>
                                        <th>Total</th>
				</tr>
			</thead>
			<tbody>
                        <?php foreach($form_tasks_closed as $item): $rowTotal = 0; ?>
                            <tr>
                                <td><?php echo $item['Name'] ?></td>
                                <td><?php if(isset($item['-2'])) {echo $item['-2']; $rowTotal=$rowTotal+$item['-2'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-3'])) {echo $item['-3']; $rowTotal=$rowTotal+$item['-3'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-4'])) {echo $item['-4']; $rowTotal=$rowTotal+$item['-4'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-1'])) {echo $item['-1']; $rowTotal=$rowTotal+$item['-1'];} else echo '0'; ?></td>
                                <td><strong><?php echo $rowTotal; ?></strong></td>
                            </tr>
                        <?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="span3 well">
                <strong>Tasks created by Refworks</strong>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Month</th>
					<th>Year</th>
					<th>Tasks</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($refworks_tasks->result_array() as $task): ?>
			<tr>
				<td><?php echo $task['Month'] ?></td>
				<td><?php echo $task['Year'] ?></td>
				<td><?php echo $task['Total'] ?></td>
			</tr>
		<?php endforeach ?>
			</tbody>
		</table>
	</div>
	
	<div class="span8 well">
                <strong>Closed Tasks created by Form</strong>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Year-Month</th>
					<th>Deposited</th>
					<th>Denied</th>
                                        <th>No Manuscript</th>
                                        <th>Other</th>
                                        <th>Total</th>
				</tr>
			</thead>
			<tbody>
                        <?php foreach($refworks_tasks_closed as $item): $rowTotal = 0; ?>
                            <tr>
                                <td><?php echo $item['Name'] ?></td>
                                <td><?php if(isset($item['-2'])) {echo $item['-2']; $rowTotal=$rowTotal+$item['-2'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-3'])) {echo $item['-3']; $rowTotal=$rowTotal+$item['-3'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-4'])) {echo $item['-4']; $rowTotal=$rowTotal+$item['-4'];} else echo '0'; ?></td>
                                <td><?php if(isset($item['-1'])) {echo $item['-1']; $rowTotal=$rowTotal+$item['-1'];} else echo '0'; ?></td>
                                <td><strong><?php echo $rowTotal; ?></strong></td>
                            </tr>
                        <?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>