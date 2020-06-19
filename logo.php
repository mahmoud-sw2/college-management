
<!DOCTYPE html>

<html>
<head>
    
    
    <?php
	
   include_once('connect.php');
  if(isset($_POST['login_user'])){
	$uname= $_POST['username'];
	$pass= $_POST['password'];
	$result= mysqli_query($db, "SELECT * FROM users WHERE Username='$uname'&&Password='$pass'");
	
	
	
		if(mysqli_num_rows($result) == 1){ 
		session_start();
		   $row= mysqli_fetch_array($result);
		   
			
			$_SESSION['username'] = $uname;
			$_SESSION['idd'] ="$row[UserID]";
			header('Location: user-vie.php');
			
				 }else {
					 echo"wrong username or password";
				 }
  }

  ?>
   
   



	
  <title>login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="logo.php">
  	
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>