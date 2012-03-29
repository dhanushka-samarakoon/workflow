<?php $this->load->helper('url'); ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="task-list">
	<thead>
		<tr>
			<th>ID</th>
			<th>Author</th>
			<th>Title</th>
			<th>Status</th>
			<th>User</th>
			<th>Initiated On</th>
			<th>Last Updated</th>
			<th>-</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tasks->result_array() as $task): ?>
	<tr>
    	<td><?php echo $task['TaskID'] ?></td>
    	<td><?php echo $task['Author'] ?></td>
        <td><?php echo $task['Title'] ?></td>
        <td><?php echo $task['status_desc'] ?></td>
        <td><?php echo $task['FirstName'].' '.$task['LastName'] ?></td>
        <td><?php echo $task['CreatedDate'] ?></td>
        <td><?php echo $task['LastUpdatedDate'] ?></td>
		<td><a class="btn btn-info" href="<?php echo site_url('tasks/edit/'.$task['TaskID']);?>"><i class="icon-pencil icon-white"></i> </a></td>
	</tr>
<?php endforeach ?>
	</tbody>
</table>
