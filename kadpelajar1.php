<html>
<body>
<?php
session_start();
include("dbconn.php");

if(isset($_POST['check']))		
{	
	
	$series_no = $_POST['series_no'];

	$sql0 = "SELECT * FROM complain where series_no = '".$series_no."'";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));

	$ro0 = mysqli_num_rows($query0);

	if ($ro0 == 0)
	{	
		echo "<script type='text/javascript'>
          alert('Not Found! Please Fill Aduan Awal(FIR)');
          setTimeout(window.location='fir.php',2000);
          </script>";
	} 

	else {

		$r = mysqli_fetch_assoc($query0);
		$_SESSION['series_no'] = $r['series_no'];
		header("Location: kadpelajar2.php");

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>