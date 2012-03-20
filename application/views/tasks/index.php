<?php $this->load->helper('url'); ?>
<table>
<?php foreach ($tasks->result_array() as $task): ?>
	<tr>
    	<td><?php echo $task['TaskID'] ?></td>
        <td><?php echo $task['Title'] ?></td>
		<td><a href="<?php echo site_url('tasks/edit/'.$task['TaskID']);?>">Edit</a></td>
	</tr>
<?php endforeach ?>
</table>
