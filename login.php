<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<TYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	    action="check-login.php" 
      	    method="post" 
      	    style="width: 450px;">
      	    <!-- <h3 class="text-center p-3">LOGIN</h3> -->
			<div class="text-center"><img src="assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7-removebg-preview.png" alt="" style="height: 90px;"></div>
      	    <?php if (isset($_GET['error'])) { ?>
      	    <div class="alert alert-danger alert-dismissible" role="alert">
				  <?=$_GET['error']?>
				<!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
			</div>
			<?php } ?>
		<div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		</div>
		<div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		</div>
		  <!-- <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">User</option>
			  <option value="admin">Admin</option>
		  </select> -->
		<button type="submit" class="btn btn-primary">LOGIN</button>
		</form>
    </div>
</body>
</html>
<?php }else{
	header("Location: dashboard.php");
} ?>
