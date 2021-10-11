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
	$r = mysqli_fetch_assoc($query0);

	/*if ($ro0 == 0)
	{	
		echo "<script type='text/javascript'>
          alert('Not Found! Please Fill Aduan Awal(FIR)');
          setTimeout(window.location='fir.php',2000);
          </script>";
	} */
	$gender = $r['gender'];

	if ($gender == 'Lelaki'){

		//$r = mysqli_fetch_assoc($query0);
		$_SESSION['matric_no'] = $r['matric_no'];
		header("Location: KPSiswa.php");

	}

	else if ($gender == 'Perempuan'){

		//$r = mysqli_fetch_assoc($query0);
		$_SESSION['matric_no'] = $r['matric_no'];
		header("Location: KPSiswi.php");

	}

	else {
		echo "<script type='text/javascript'>
          alert('Student Not Found! Please Register Student First');
          setTimeout(window.location='srs.php',2000);
          </script>";

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>