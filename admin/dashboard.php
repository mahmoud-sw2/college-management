<?php 	ob_start(); // Output Buffering Start
	session_start();
if (isset($_SESSION['Username'])){
	include "connect.php";

      include "includes/nav.php";
      

$stmt = $con->prepare("SELECT * FROM users WHERE GroupID != 1  ORDER BY UserID DESC");

$stmt->execute();

			// Assign To Variable 

			$rows = $stmt->fetchAll();

			if (! empty($rows)) {
?>
<div class="table">
					<table>
						<tr>

							<td class="s">ID</td>
							<td class="s">Username</td>
							<td class="s">Email</td>
							<td class="s">Full Name</td>
							
						</tr>

<?php 
						
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['UserID'] . "</td>";
									
									echo "<td>" . $row['Username'] . "</td>";
									echo "<td>" . $row['Email'] . "</td>";
									echo "<td>" . $row['Fullname'] . "</td>";}
									echo "</tr";
									
						

?>						
					</table>
				</div>

<?php

			}


		
	} else {

		header('Location: login.php');

		exit();
	}

?>