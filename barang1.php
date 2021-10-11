<html>
<body>
<?php
session_start();
include("dbconn.php");

if(isset($_POST['check']))		
{	
	
	$matric_no = $_POST['matric_no'];

	$sql0 = "SELECT * FROM student where matric_no = '".$matric_no."'";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));

	$ro0 = mysqli_num_rows($query0);

	if ($ro0 == 0)
	{
		echo "Not Found! Please make sure that you have enter a correct student matric number. Or you can register the student here";
		//header("Location: AdminInformation.php");
		echo '<a href="srs.php"> Student Registration System (SRS)</a>';
		echo "<br>";
		echo '<a href="barang.php"> Go Back</a>';
	} 

	else {

		$r = mysqli_fetch_assoc($query0);
		$_SESSION['matric_no'] = $r['matric_no'];
		header("Location: barang2.php");

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>