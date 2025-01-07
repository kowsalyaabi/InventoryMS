<?php 
ob_start();
session_start();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Inventory.php';
	$inventory = new Inventory();
	$login = $inventory->login($_POST['email'], $_POST['pwd']); 
	if(!empty($login)) {
		$_SESSION['userid'] = $login[0]['userid'];
		$_SESSION['name'] = $login[0]['name'];			
		header("Location:index1.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<style>
html,
body,
body>.container {
    height: 95%;
    width: 100%;
}
body>.container {
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
#title{
	text-shadow:2px 2px 5px #000;
} 
</style>
<?php include('inc/container.php');?>

	
	<div class="container col-md-8">
		<div class="card rounded-0 shadow">
			<div class="card-header">
				<p class=" h3  m-2 ">Admin Login</p>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					<form method="post" action="">
						<div class="form-group">
						<?php if ($loginError ) { ?>
							<div class="alert alert-danger rounded-0 py-1"><?php echo $loginError; ?></div>
						<?php } ?>
						</div>
						<div class="mb-3">
							<label for="email" class="control-label">Email</label>
							<input name="email" id="email" type="email" class="form-control rounded-0" placeholder="Email address" autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
						</div>
						<div class="mb-3">
							<label for="password" class="control-label">Password</label>
							<input type="password" class="form-control rounded-0" id="password" name="pwd" placeholder="Password" required>
						</div>  
						<div class="">
							<button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
						</div>
				
					</form>
				</div>
			</div>
		</div>
	</div>		
<?php include('inc/footer.php');?>