<?php $this->load->helper('url'); ?>
<div class="row">
	<div class="span8 offset2">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($publishers->result_array() as $publisher): ?>
				<tr>
					<td><?php echo $publisher['PubID'] ?></td>
					<td><?php echo $publisher['PubName'] ?></td>
					<td><a class="btn btn-mini btn-info" href="<?php echo site_url('publishers/view/'.$publisher['PubID']);?>"><i class="icon-folder-open icon-white"></i> View</a></td>
					<td><a class="btn btn-mini btn-success" href="<?php echo site_url('publishers/edit/'.$publisher['PubID']);?>"><i class="icon-edit icon-white"></i> Edit</a></td>
					<td><a class="btn btn-mini btn-danger" href="<?php echo site_url('publishers/remove/'.$publisher['PubID']);?>" onClick="return confirm('Are you sure you want to remove the Publisher?')"><i class="icon-trash icon-white"></i> Remove</a></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
