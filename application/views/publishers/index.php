<? $this->load->helper('url'); ?>
<table>
<?php foreach ($publishers->result_array() as $publisher): ?>
	<tr>
    	<td><?php echo $publisher['PubID'] ?></td>
        <td><?php echo $publisher['PubName'] ?></td>
        <td><a href="<? echo site_url('publishers/view/'.$publisher['PubID']);?>">View</a></td>
		<td><a href="<? echo site_url('publishers/edit/'.$publisher['PubID']);?>" >Edit</a></td>
		<td><a href="<? echo site_url('publishers/remove/'.$publisher['PubID']);?>" onClick="return confirm('Are you sure you want to remove the Publisher?')">Remove</a></td>
	</tr>
<?php endforeach ?>
</table>
