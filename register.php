<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'firsttry');


if (isset($_POST['register'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fullname)) { array_push($errors, "fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

 
  $user_check_query = "SELECT * FROM users WHERE Username='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

 
  if (count($errors) == 0) {
    $password =($password_1);

    $query = "INSERT INTO users (username, email, password,fullname) 
          VALUES('$username', '$email', '$password','$fullname')";
    mysqli_query($db, $query);
    
	header('Location: logo.php');
   
   mkdir($username);
   
  
  }
}

  if (count($errors) > 0): ?>

  <div class="error">

    <?php foreach ($errors as $error): ?>
      <p><?php echo $error ?></p>
    <?php endforeach ?>
  </div>
<?php  endif ?>



<!DOCTYPE html>


<html>
<head>
  <title>Registration </title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
      
  	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" >
  	</div>
	<div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fullname" >
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="register">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="logo.php">Sign in</a>
  	</p>
  </form>
</body>
</html>