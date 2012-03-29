<div class="row">
	<div class="span6 offset3">
    	<h3><?php echo $publisher['PubID'].' - '.$publisher['PubName'] ?></h3>
		<hr/>
		<dl class="dl-horizontal">
			<dt>Policy Link</dt>
			<dd><a href="<?php echo $publisher['PolicyLink'] ?>"><?php echo $publisher['PolicyLink'] ?></a></dd>
			<dt>Policy Text</dt>
			<dd><?php echo $publisher['PolicyText'] ?></dd>
			<dt>What we can put up</dt>
			<dd><?php echo $publisher['what_we_can_put_up'] ?></dd>
			<dt>What we need to add</dt>
			<dd><?php echo $publisher['what_we_need_to_add'] ?></dd>
			<dt>Embargo</dt>
			<dd><?php echo $publisher['embargo'] ?></dd>
			<dt></dt>
			<dd><?php echo $publisher['notes'] ?></dd>
		</dl> 
	</div>
	<div class="span3">
		<a class="btn btn-success" href="<?php echo site_url('publishers/edit/'.$publisher['PubID']);?>" ><i class="icon-edit icon-white"></i> Edit</a>
		<a class="btn btn-danger" href="<?php echo site_url('publishers/remove/'.$publisher['PubID']);?>" onClick="return confirm('Are you sure you want to remove the Publisher?')"><i class="icon-trash icon-white"></i> Remove</a>
	</div>
</div>