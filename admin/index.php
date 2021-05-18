<?php require_once('includes/startup.php');
$error = '';
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM users WHERE username='". $username ."' AND password='". md5($password) ."'";
	
	$rs = mysqli_query($con, $sql);
	
	if(mysqli_num_rows($rs)){
		
		$rec = mysqli_fetch_assoc($rs);
		
		$_SESSION['login'] = $rec;
		redirect('dashboard.php');
	}else{
		$error = 'Incorrect username/password!';
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Admin Panel Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="POST">
    <img class="mb-4" src="images/logo.png" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
	
	<?php if(!empty($error)){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <?php echo $error; ?>
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php } ?>
	
	

    <div class="form-floating">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>