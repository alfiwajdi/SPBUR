<html>
<body>
	<?php
	include("dbconn.php");
	if(isset($_POST['signup']))
	{
		$staff_ID = $_POST['staff_ID'];
		$pass_word = $_POST['pass_word'];		

		$sql0 = "SELECT staff_ID ,pass_word FROM staff WHERE staff_ID = '$staff_ID' AND pass_word = '$pass_word'"; 
		$query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));
		$row0 = mysqli_num_rows($query0);
		if($row0 != 0){
			echo "<script type='text/javascript'>
          	alert('User Already Exist');
          	setTimeout(window.location='signup.php',2000);
          	</script>";
			echo "Error: " . mysqli_error($dbconn);
	}

	else{
		//execute SQL INSERT Command
		$sql2 = "INSERT INTO Staff (staff_ID ,pass_word) VALUES ('".$staff_ID."', '".$pass_word."')";
		mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
		echo "<script type='text/javascript'>
          	alert('Succesfull Created');
          	setTimeout(window.location='Dashboard.php',2000);
          	</script>";
	}//close if isset()

	}

	//close db connection
	mysqli_close($dbconn);
	?>
</body>
<a href="index.html">Log In Again.</a><br>	 
</html>