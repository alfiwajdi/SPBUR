<style>
table, th, td {
    border: 1px solid black;
}
</style>
<html>
<body>
<?php
session_start();
include("dbconn.php");

if(isset($_POST['submit']))		
{	
	$name = $_POST['name'];	
	$matric_no = $_POST['matric_no'];
	$mykad_no = $_POST['ic_number'];
	$prog_code = $_POST['course_code'];
	$summon_date = $_POST['summon_date'];
	$summon_time = $_POST['summon_time'];			
	$summon_place = $_POST['summon_place'];	
	$chkbox = $_POST['summons'];
	$count = count($chkbox);
	$rm = "";
	
 
 	$chkNew = "";			
 	foreach($chkbox as $chkNew1) 
 	{ 
 		$chkNew .= $chkNew1 . ", "; 
 	} 

 	$rm = ($count * 50);

	$sql0 = "INSERT INTO kp(gender, name, matric_no, mykad_no, prog_code, summon_date, summon_time, summon_place, summons, rm, paybefore) VALUES ('Siswi', '".$name."', '".$matric_no."', '".$mykad_no."', '".$prog_code."', '".$summon_date."', '".$summon_time."', '".$summon_place."', '".$chkNew."', '".$rm."', 'Ditentukan Oleh Pegawai Yang Bertugas')";
	//$sql1 = "INSERT INTO spbur (MultipleValue) VALUES ('$chkNew')";

	

	if (mysqli_query($dbconn, $sql0)) 
	{?>
    <table style="width:100%">
                                        
                                            <tr>
                                                <th>No Siri</th>
                                                <th>Siswa/Siswi</th>
                                                <th>Nama</th>
                                                <th>Kad Matrik</th>
                                                <th>Kad Pengenalan</th>
                                                <th>Kod Program</th>
                                                <th>Tarikh Saman</th>
                                                <th>Masa Saman</th>
                                                <th>Tempat Saman</th>
                                                <th>Kesalahan</th>
                                                <th>Kompaun</th>
                                                <th>Tarikh Akhir Pembayaran</th>
                                                <th style="color:green">Print</th>
                                            </tr>
                                       
                                        <tbody>
                    <?php
                    $sql = "SELECT * FROM kp ORDER BY series_no DESC LIMIT 1 ";
                    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
                    $row = mysqli_num_rows($query); // Count the record of table to see it's not empty
                    if($row != 0) {
                        while($ro = mysqli_fetch_assoc($query)){

                                        echo "<tr>";
                                        echo "<td>".$ro['series_no']."</td>";
                                        echo "<input type='text' style='display:none' name='series_no' value='".$ro['series_no']."'>";
                                        echo "<td>".$ro['gender']."</td>";
                                        echo "<input type='text' style='display:none' name='gender' value='".$ro['gender']."'>";
                                        echo "<td>".$ro['name']."</td>";
                                        echo "<input type='text' style='display:none' name='name' value='".$ro['name']."'>";
                                        echo "<td>".$ro['matric_no']."</td>";
                                        echo "<input type='text' style='display:none' name='matric_no' value='".$ro['matric_no']."'>";
                                        echo "<td>".$ro['mykad_no']."</td>";
                                        echo "<input type='text' style='display:none' name='mykad_no' value='".$ro['mykad_no']."'>";
                                        echo "<td>".$ro['prog_code']."</td>";
                                        echo "<input type='text' style='display:none' name='prog_code' value='".$ro['prog_code']."'>";
                                        echo "<td>".$ro['summon_date']."</td>";
                                        echo "<input type='text' style='display:none' name='summon_date' value='".$ro['summon_date']."'>";
                                        echo "<td>".$ro['summon_time']."</td>";
                                        echo "<input type='text' style='display:none' name='summon_time' value='".$ro['summon_time']."'>";
                                        echo "<td>".$ro['summon_place']."</td>";
                                        echo "<input type='text' style='display:none' name='summon_place' value='".$ro['summon_place']."'>";
                                        echo "<td>".$ro['summons']."</td>";
                                        echo "<input type='text' style='display:none' name='summons' value='".$ro['summons']."'>";
                                        echo "<td>".$ro['rm']."</td>";
                                        echo "<input type='text' style='display:none' name='rm' value='".$ro['rm']."'>";
                                        echo "<td>".$ro['paybefore']."</td>";
                                        echo "<input type='text' style='display:none' name='paybefore' value='".$ro['paybefore']."'>";
                                        echo '<td><form method = "POST"><button type="submit" name="print" value='.$ro['series_no'].' formaction="KPPrint.php" class="btn btn-info">Print</button></form></td>';
                                        echo "</tr>";

                                            }
                                            }?>
                                            </tbody>
                                    </table>
                                    <?php

    echo "Data Saved";

		/*echo "The Default Amount To Be Pay are RM".$rm."";
		echo "<script type='text/javascript'>
          alert('Successful');
          setTimeout(window.location='KPCheck.php',2000);
          </script>";*/
	} 

	else {
		echo "<script type='text/javascript'>
          	alert('An Error Occur');
          	setTimeout(window.location='KPCheck.php',2000);
          	</script>";
		echo "Error: " . mysqli_error($dbconn);

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>