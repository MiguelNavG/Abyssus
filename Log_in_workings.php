<html>
<head>
</head>
<body>
	<?php
	/*error_reporting(0);*/
	$email = filter_var($_POST['femail']);
	$pas = filter_var($_POST['fpas']);
	$servername = "tepeu.lcg.unam.mx";
			$username = "danielaf";
			$password = "f4l31n4d";
			$con = new mysqli($servername, $username, $password, "Abyssus");
			if ($con->connect_error){
				die ("Connection failed: " . $con->connect_error);
			}
			$login= "SELECT user_email, user_password FROM ACCOUNTS WHERE user_email = '$email' AND user_password = '$pas';";
			$check = $con -> query($login);
			if ($check->num_rows != 0){
				$getname = "SELECT user_name FROM ACCOUNTS WHERE user_email = '$email';";
				$name = $con -> query($getname);
				$name = $name -> fetch_array();
				echo "<p>Welcome back $name[0].</p>";
					/* <form method = "POST" action = "main_page.php">
						<input type = "hidden" name = "email" value = $email>
						<input type  = "hidden" name = "logged_in_status" value = 1>
					</form> */
			}else{
				echo "Los datos ingresados no son correctos. Por favor, intente nuevamente.";
			}
		$con->close();
	?>
	<form method = "post" action = "Log_in.php">
		<input type = "submit" name = "Return" value = "Regresar a la pagina de Log_in.">
	</form>
</body>
</html>