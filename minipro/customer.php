<?php 
ob_start();
session_start();
include "db.php";
include('inc/header.php');
include 'Inventory.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/customer.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
	<?php include("menus.php"); ?> 
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">Customer List</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
							<button type="button" name="add" id="addCustomer" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-primary bg-gradient btn-sm rounded-0"><i class="far fa-plus-square"></i> New Customer</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>User ID</th>	
										<th>Password</th>									
										<th>Name</th>
										<th>Reg Num</th>
										<th>Year</th>
										<th>Department</th>
										<th>Mobile</th>
										
										<th>Balance</th>
										<th>Action</th>
									</tr>
								</thead>
								<?php
								$select = "SELECT * FROM ims_customer";
								$res = mysqli_query($conn,$select);
								
								if(mysqli_num_rows($res)){
									foreach($res as $row){
										$id = $row['user_id'];

										$result1 = mysqli_query($conn, "SELECT SUM(balance) AS value_add FROM balance where userid = '$id' "); 
										$row1 = mysqli_fetch_assoc($result1); 
										$sum1 = $row1['value_add'];
										
										
                                     $result = mysqli_query($conn, "SELECT SUM(price) AS value_sum FROM ims_order where user = '$id' "); 
									 $roww = mysqli_fetch_assoc($result); 
									 $sum = $roww['value_sum'];

									 $total = $sum1 - $sum;
									 

										
										echo "
										<tr>
										<td>$id</td>
										<td>$row[password]</td>
										<td>$row[name]</td>
										<td>$row[reg]</td>
										<td>$row[year]</td>
										<td>$row[dept]</td>
										<td>$row[mobile]</td>
										<td> $total</td>
										<td><button class='btn btn-danger'><a class='text-light' href = 'delete.php?deleteid=".$row['user_id']." '>Delete</a></button></td>
										</tr>
										";
						}
					}


?>
                        </table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div id="customerModal" class="modal">
        	<div class="modal-dialog modal-dialog-centered  rounded-0">
        			<div class="modal-content rounded-0">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-plus"></i> Add Customer</h4>
							<button type="button" class="btn-close text-xs" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<form method="post" action="cus_update.php" >
									<input type="hidden" name="userid" id="userid" />
									<input type="hidden" name="btn_action" id="btn_action" value="customerAdd" />
									<div class="mb-3">
										<label class="control-label">User ID</label>
										<input type="text" name="user_id" id="cname" class="form-control rounded-0" required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Password</label>
										<input type="text" name="password" id="mobile" class="form-control rounded-0" required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Name</label>
										<input type="text" name="name" id="balance" class="form-control rounded-0"  required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Reg Number</label>
										<input type="text" name="reg" id="address" class="form-control rounded-0" required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Year</label>
										<input type="text" name="year" id="address" class="form-control rounded-0" required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Department</label>
										<input type="text" name="dept" id="address" class="form-control rounded-0" required/>
									</div>
									<div class="mb-3">
										<label class="control-label">Mobile</label>
										<input type="text" name="mobile" id="address" class="form-control rounded-0" required/>
</div>
							<button type="submit" class="btn btn-sm rounded-0 btn-primary" >Save</button>
							<button type="button" class="btn btn-sm rounded-0 btn-default border" data-bs-dismiss="modal">Close</button>
						
								</form>
							</div>
						</div>
					</div>
        	</div>
        </div>	
	</div>	
</div>	
<?php include('inc/footer.php');?>