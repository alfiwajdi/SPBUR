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
	$currentdate =$_POST['currentdate'];
	$matric_no = $_POST['matric_no'];
	$name = $_POST['name'];
	$prog_code = $_POST['course_code'];
	$faculty = $_POST['faculty'];
	$address = $_POST['address'];
	$phone_no =$_POST['phone_no'];
	$validuntil =$_POST['validuntil'];
	$refer = $_POST['refer'];


	$sql0 = "INSERT INTO kad (currentdate, matric_no, name, prog_code, faculty, address, phone_no, validuntil, refer)VALUES('".$currentdate."', '".$matric_no."', '".$name."', '".$prog_code."', '".$faculty."', '".$address."', '".$phone_no."', '".$validuntil."', '".$refer."')";
	
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));


	if ($query0)
	{
		?>
    <table style="width:100%">
                                        
                                            <tr>
                                                <th>No Siri</th>
                                                <th>Tarikh</th>
                                                <th>Kad Matrik</th>
                                                <th>Nama</th>
                                                <th>Kod Program</th>
                                                <th>Fakulti</th>
                                                <th>Alamat</th>
                                                <th>No Telefon</th>
                                                <th>Sah Sehingga</th>
                                                <th>No Rujukan (PB05)</th>
                                                <th style="color:green">Print</th>
                                            </tr>
                                       
                                        <tbody>
                    <?php
                    $sql = "SELECT * FROM kad ORDER BY series_no DESC LIMIT 1 ";
                    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
                    $row = mysqli_num_rows($query); // Count the record of table to see it's not empty
                    if($row != 0) {
                        while($ro = mysqli_fetch_assoc($query)){
                          echo "<tr>";
                          echo "<td>".$ro['series_no']."</td>";
                          echo "<input type='text' style='display:none' name='series_no' value='".$ro['series_no']."'>";
                          $date = $ro['currentdate'];
                          $newDate = date('d/m/Y', strtotime($date));
                          echo "<td>".$newDate."</td>";
                          echo "<input type='date' style='display:none' name='currentdate' value='".$ro['currentdate']."'>";
                          echo "<td>".$ro['matric_no']."</td>";
                          echo "<input type='text' style='display:none' name='matric_no' value='".$ro['matric_no']."'>";
                          echo "<td>".$ro['name']."</td>";
                          echo "<input type='text' style='display:none' name='name' value='".$ro['name']."'>";
                          echo "<td>".$ro['prog_code']."</td>";
                          echo "<input type='text' style='display:none' name='prog_code' value='".$ro['prog_code']."'>";
                          echo "<td>".$ro['faculty']."</td>";
                          echo "<input type='text' style='display:none' name='faculty' value='".$ro['faculty']."'>";
                          echo "<td>".$ro['address']."</td>";
                          echo "<input type='text' style='display:none' name='address' value='".$ro['address']."'>";
                          echo "<td>".$ro['phone_no']."</td>";
                          echo "<input type='text' style='display:none' name='phone_no' value='".$ro['phone_no']."'>";
                          $date2 = $ro['validuntil'];
                          $newDate2 = date('d/m/Y', strtotime($date2));
                          echo "<td>".$newDate2."</td>";
                          echo "<input type='date' style='display:none' name='validuntil' value='".$ro['validuntil']."'>";
                          echo "<td>".$ro['refer']."</td>";
                          echo "<input type='text' style='display:none' name='refer' value='".$ro['refer']."'>";
                          echo '<td><form method="POST"><button type="submit" name="matricPrint" value='.$ro['series_no'].' formaction="MatrikGantiPrint.php" class="btn btn-info">Print</button></form></td>';
                                        echo "</tr>";

                                            }
                                            }?>
                                            </tbody>
                                    </table>
                                    <lable style="color:red">Click button "Print" to print report</lable>
                                    <?php
		/*echo "<script type='text/javascript'>
          alert('Sucessfull Submit!');
          setTimeout(window.location='kadpelajar.php',2000);
          </script>";*/
	} 

	else {

		echo "<script type='text/javascript'>
          alert('Error! Cannot submit.');
          setTimeout(window.location='kadpelajar.php',2000);
          </script>";

	}
				
}
	mysqli_close($dbconn);
?>					
	</body>
</html>