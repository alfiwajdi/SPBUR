<html>
<body>
<?php
//session_start();
include("dbconn.php");

if(isset($_POST['updatebutton']))		
{	
	$matric_no = $_POST['matric_no'];	
	$name = $_POST['name'];
	$ic_number = $_POST['ic_number'];
	$course_code = $_POST['course_code'];
	$faculty = $_POST['faculty'];
	$address = $_POST['address'];			
	$phone_no = $_POST['phone_no'];		
	$gender = $_POST['gender'];		

	$sql = "UPDATE student SET name = '$name', ic_number = '$ic_number', course_code = '$course_code', faculty = '$faculty', address = '$address', phone_no = '$phone_no', gender = '$gender' WHERE matric_no = '$matric_no'";	

	if (mysqli_query($dbconn, $sql)) {

		 echo "<script type='text/javascript'>
          alert('Successful Update!');
          setTimeout(window.location='rpelajar.php',2000);
          </script>";

	} 

	else {

		echo "Error: " . mysqli_error($dbconn);

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>