<?php 
	$this->load->helper('url'); 
	$this->load->library('session');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?> - Workflow Managment System</title>
	
	<link type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo base_url(); ?>assets/DataTables/css/DT_bootstrap.css" rel="stylesheet" >
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/js/DT_bootstrap.js"></script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url(); ?>">Workflow Managment System</a>
				<ul class="nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"	data-toggle="dropdown">Tasks<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('tasks');?>">View all Tasks</a></li>
							<li><a href="<?php echo site_url('tasks/add');?>">Add new Task</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"	data-toggle="dropdown">Publishers<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('publishers');?>">View all Publishers </a></li>
							<li><a href="<?php echo site_url('publishers/add');?>">Add new Publisher </a></li>
						</ul>
					</li>
					<li><a href="<?php echo site_url('refworks');?>">RefWorks</a></li>
				</ul>
				<p class="navbar-text pull-right">
					<a href="<?php echo site_url('users/logout');?>">Log Out</a>
				</p>
			</div>
		</div>
	</div>
	<br/><br/><br/>
	<div class="container-fluid">
	<div class="row-fluid">
	
	