<!DOCTYPE html>
<?php
include_once('connect.php');
?>
<html>

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
    <link rel="stylesheet" href="css/full-page-tabs.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/logout.css">


    <title>User View</title>

</head>

<body>

    <section id="tabs-with-content">
        <button class="tablink" onclick="openPage('profile', this, 'rgba(5, 88, 66, 0.79)')">Profile</button>
        <button class="logout" onclick=location.replace("logout.php")>Logout</button>
    </section>


        <div id="profile" class="tabcontent">
            <div class="tab-contnt">
                <h3>Profile</h3>
                <p>
                    <?php 
 session_start();
 

$res = mysqli_query($db, "SELECT * FROM users");

while( $row = mysqli_fetch_array($res))
	if($row[0]==$_SESSION['idd'])	
echo "<div style='background-color: white; padding: 20px;'><span style='font-size: 16px; color: seagreen;padding: 2px; '>
Full Name:</span> $row[Fullname]<br/>
        <span style='font-size: 16px; color: seagreen;padding: 2px; '>Email:</span> $row[Email]<br/><br/>
        <a style='background-color: rgba(5, 88, 66, 0.79);
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 10px;
    font-size: 15px;
    display: inline-block' href='edit.php?edit=$row[UserID]'>edit</a><br/></div>";
?>
                </p>
            </div>
        </div>




        <section>
            <!-- footer -->
            <footer class="container-fluid">
                <p>&copy; 2019</p>
            </footer>
        </section>
            <!-- jQuery first, then Bootstrap JS. -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="scripts/tabscript.js"></script>

</body>

</html>