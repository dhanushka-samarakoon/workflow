<? $this->load->helper('url'); ?>
<table>
<? foreach ($tasks->result_array() as $task): ?>
	<tr>
    	<td><? echo $task['TaskID'] ?></td>
        <td><? echo $task['Title'] ?></td>
		<td><a href="<? echo site_url('tasks/edit/'.$task['TaskID']);?>">Edit</a></td>
	</tr>
<? endforeach ?>
</table>
