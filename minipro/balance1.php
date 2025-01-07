<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">


</head>
<style>
	*{
		font-family: 'Source Sans Pro', sans-serif;
	}
</style>
<body>
	
	
	<div class="container mt-4">
	<?php
	include('inc/header.php');
	include 'Inventory.php';
	 include("menus.php"); ?> 
		<div class="box shadow p-3">

		
		<p class="h4">Balance</p>
		<hr>
		<form action="bal.php" method="post">
			<label for="text">User ID:</label>
			<input type="text" class="form-control rounded-0" name="userid" required>
			<label for="text">Amount:</label>
			<input type="text" class="form-control rounded-0" name="amount" required>
			
			<button class="btn btn-primary rounded-0 mt-3">Add</button>
		</form>
	</div>
	</div>
</body>
</html>