<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD Blog Simple System</title>
   <script src='https://www.google.com/recaptcha/api.js'></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php require('rooting-functions.php'); ?>
<div class="container">
	<div class="jumbotron">
		<?php if(isset($_SESSION['email'])){  ?>
			<a href='/crud-blog/?page=logout' class="btn btn-alert navbar-btn" style='float:right'>Logout here, <?php echo $_SESSION['email']; ?></a> 
		<?php } else { ?>
			<a href='/crud-blog/?page=login' class="btn btn-alert navbar-btn" style='float:right'>Login here</a> 
		<?php } ?>
		<h2>CRUD Blog Simple System</h2>
		
	</div>
	<?php include('menu.php'); ?>
	<?php 
	if(!$_GET['page']){
		include 'allposts.php';
	} else {
		if($_GET['page'] == 'registration'){
				include('registration.php');
				die();
			}
		if($_GET['page'] == 'lostpassword'){
				include('lostpassword.php');
			} else {
				if(!$_SESSION['email']){
				include('login.php');
			
		} else {
			if($_GET['page'] == 'logout'){
				session_destroy();
				header("Location: /crud-blog/?page=login");
				die();
			}
			if($_GET['page'] == 'addNew'){
				include('addNew.php');
			}
			if($_GET['page'] == 'single'){
				include('single.php');
			}
			if($_GET['page'] == 'edit'){
				include('edit.php');
			}
			
		}
		}	
	}
	?>
	<div class="jumbotron">
		<p>Created by <a href='http://www.facebook.com/mariutamihaidan'>me</a>!</p> 
	</div>
</div>

</body>
</html>
