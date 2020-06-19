<?php
	include_once('connect.php');
 
	if( isset($_GET['edit']) )
	{
		
		$id = $_GET['edit'];
		$res= mysqli_query($db, "SELECT * FROM users WHERE UserID='$id'");
		$row= mysqli_fetch_array($res);
	}
 
	
		if( isset($_POST['Pword']) )
	{
		$Pword = $_POST['Pword'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE users SET Password='$Pword' WHERE UserID='$id'";
		$res 	 = mysqli_query($db,$sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
		if( isset($_POST['Fname']) )
	{
		$Fname = $_POST['Fname'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE users SET Fullname='$Fname' WHERE UserID='$id'";
		$res 	 = mysqli_query($db,$sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=user-vie.php'>";
	}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">


    <title>Edit Info</title>
</head>
<body>

<div class="container-fluid" style="padding: 10px; margin: 20px 20px;">
<form class="form-inline" action="edit.php" method="POST">
    <h4>Fullname: </h4> <input class="form-control" type="text" name="Fname" value="<?php echo $row[4]; ?>"><br />
    <h4>Password: </h4><input class="form-control" type="password" name="Pword" value="<?php echo $row[2]; ?>"><br />
    <input class="form-check-input" type="hidden" name="id" value="<?php echo $row[0]; ?>"><br/>
    <input class="btn btn-primary" style="background-color: rgba(5, 88, 66, 0.79)" type="submit" value=" Update " >
</form>
</div>


</body>
</html>

