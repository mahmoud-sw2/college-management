 <?php
session_start();

if (isset($_SESSION['Username'])) {
		header('Location: dashboard.php'); // Redirect To Dashboard Page
	}

include "includes/header.php";
include "connect.php";

	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$hashedPass = sha1($password);

		// Check If The User Exist In Database

		$stmt = $con->prepare("SELECT 
									UserID, Username, Password 
								FROM 
									users 
								WHERE 
									Username = ? 
								AND 
									Password = ? 
								AND 
									GroupID = 1
								LIMIT 1");

		$stmt->execute(array($username, $hashedPass));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

		// If Count > 0 This Mean The Database Contain Record About This Username

		if ($count > 0) {
			$_SESSION['Username'] = $username; // Register Session Name
			$_SESSION['ID'] = $row['UserID']; // Register Session ID
			header('Location: dashboard.php'); // Redirect To Dashboard Page
			exit();
		}

	}

?>


	<div class="all_login">
			<div class="login">
				<p>Sign In</p>
			</div>
			<br><br>
			<div class="form">
				
				<form class="user" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input class="userna" type="text" name="username" placeholder="Username">
				<br><br>
				<input class="userna" type="password" name="password" placeholder="password">
				<div class="bu"><button class="btn2">Login</button></div>
				<br><br>
				
			</form>

			</div>
			

			
			
			
	</div>
</body>
</html>

             <?php include"includes/footer.php"; ?> 