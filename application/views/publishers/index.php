<table>
<?php foreach ($publishers as $publisher): ?>
	<tr>
    	<td><?php echo $publisher['PubID'] ?></td>
        <td><?php echo $publisher['PubName'] ?></td>
        <td><a href="view/<?php echo $publisher['PubID'] ?>">View</a></td>
	</tr>
<?php endforeach ?>
</table>