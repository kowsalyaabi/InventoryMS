<?php 
ob_start();
session_start();
include('inc/header.php');
include 'Inventory.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
	<?php include("menus.php"); ?>   
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
				<div class="card-header">
					<div class="row">
											
					</div>
				</div>
				<div class="card-body">
					<div class="row"><div class="col-sm-12 table-responsive">
					Welcome to Inventary management system
					</div></div>
				</div>
			</div>
		</div>
	</div>
		
</div>	
<?php include('inc/footer.php');?>






