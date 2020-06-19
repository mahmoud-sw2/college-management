				<?php 	 
	session_start();
if (isset($_SESSION['Username'])){
	include "connect.php";

      include "includes/nav.php";
      	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$userid = $_POST['ID'];

					$stmt = $con->prepare("DELETE FROM users WHERE UserID = :zuser");

					$stmt->execute(array(

							'zuser' 	=> $userid,
							
					));

					header('Location: dashboard.php');
}


?>

<div class="sf">
	<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<input class="r" type="text" name="ID" placeholder="Enter ID" >
			<br><br>
			<div class="bu">
				<button class="btn2">Delete</button>
			</div>
		
		
	</form>
</div>


<?php

	}else {

		header('Location: login.php');

		exit();
	}

?>