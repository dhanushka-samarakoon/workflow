<table>
<?php foreach ($publishers as $publisher): ?>
	<tr>
    	<td><?php echo $publisher['PubID'] ?></td>
        <td><?php echo $publisher['PubName'] ?></td>
        <td><a href="publishers/view/<?php echo $publisher['PubID'] ?>">View</a></td>
		<td><a href="publishers/edit/<?php echo $publisher['PubID'] ?>" >Edit</a></td>
		<td><a href="publishers/remove/<?php echo $publisher['PubID'] ?>" onClick="return confirm('Are you sure you want to remove the Publisher?')">Remove</a></td>
	</tr>
<?php endforeach ?>
</table>
