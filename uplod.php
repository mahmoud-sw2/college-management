<?php
include_once('connect.php');
if(isset($_POST['submit']))
{
	session_start();
	$fileName = $_FILES['file']['name'];
	$FType = $_FILES['file']['type'];
	$FSize = $_FILES['file']['size'];
	$FTmpname = $_FILES['file']['tmp_name'];
	$fileExt = explode('.',$fileName); 
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png','pdf');
	if (in_array($fileActualExt,$allowed))
	{if ($FSize <1000000){
	$NewFilename = uniqid('',true).".".$fileActualExt;
	$Dest = $_SESSION['username']."/".$fileName;
	
	$q="INSERT INTO `files`(`visibility`, `Name`, `Link`) VALUES ('$_SESSION[idd]','$fileName','$Dest')";
	$re=(mysqli_query($db,$q));
	mysqli_free_result($re);
	mysqli_close($db);
	move_uploaded_file($FTmpname,$Dest );
	
	header('Location: user-vie.php');
	 
	}
	else {echo"file is too big";}
}	
else{echo"can not upload file with this extension";}
}
	?>