<?php $this->load->helper('url'); ?>
<table>
	<tr>
		<td>ID</td>
		<td>Author</td>
		<td>Title</td>
		<td>Status</td>
		<td>User</td>
		<td>Initiated On</td>
		<td>Last Updated</td>
		<td>-</td>
	</tr>
<?php foreach ($tasks->result_array() as $task): ?>
	<tr>
    	<td><?php echo $task['TaskID'] ?></td>
    	<td><?php echo $task['Author'] ?></td>
        <td><?php echo $task['Title'] ?></td>
        <td><?php echo $task['status_desc'] ?></td>
        <td><?php echo $task['FirstName'].' '.$task['LastName'] ?></td>
        <td><?php echo $task['CreatedDate'] ?></td>
        <td><?php echo $task['LastUpdatedDate'] ?></td>
		<td><a href="<?php echo site_url('tasks/edit/'.$task['TaskID']);?>">Edit</a></td>
	</tr>
<?php endforeach ?>
</table>
