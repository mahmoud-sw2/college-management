<?php
session_start();
if(isset($_POST['a']))	
$_SESSION = array();
session_destroy();
header('Location: logo.php');

?>