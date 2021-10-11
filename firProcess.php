<style>
table, th, td {
    border: 1px solid black;
}
</style>
<?php
include ("dbconn.php");
if (isset($_POST['submit']))
{

  //FIR variables
  $name =   $_POST['name'];
  $ic_number =     $_POST['ic_number'];
  $matric_no = $_POST['matric_no'];
  $course_code = $_POST['course_code'];
  $faculty = $_POST['faculty'];
  $address = $_POST['address'];
  $phone_no = $_POST['phone_no'];
  $missDate = $_POST['missDate'];
  $missTime = $_POST['missTime'];
  $missPlace = $_POST['missPlace'];
  $missItem = $_POST['missItem'];
  $report = $_POST['report'];

  //FIR insert statement
  $sql1 = "INSERT INTO complain (name, ic_number, matric_no, course_code, faculty, address, phone_no, missDate, missTime, missPlace, missItem, report)
  VALUES ('".$name."', '".$ic_number."', '".$matric_no."', '".$course_code."', '".$faculty."', '".$address."', '".$phone_no."', '".$missDate."', '".$missTime."', '".$missPlace."', '".$missItem."', '".$report."')";

  $run1 = mysqli_query($dbconn,$sql1) or die ("Error: ".mysqli_error($dbconn));
  
  if ($run1)
  {?>
    <table style="width:100%">
                                        
                                            <tr>
                                                <th>No Siri</th>
                                                <th>Nama</th>
                                                <th>Kad Pengenalan</th>
                                                <th>No Matriks</th>
                                                <th>Kod Program</th>
                                                <th>Fakulti</th>
                                                <th>Alamat</th>
                                                <th>No Telefon</th>
                                                <th>Tarikh Hilang</th>
                                                <th>Masa Hilang</th>
                                                <th>Tempat Hilang</th>
                                                <th>Barang Hilang</th>
                                                <th>Keterangan</th>
                                                <th style="color:green">Print</th>
                                            </tr>
                                       
                                        <tbody>
                    <?php
                    $sql = "SELECT * FROM complain ORDER BY series_no DESC LIMIT 1 ";
                    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
                    $row = mysqli_num_rows($query); // Count the record of table to see it's not empty
                    if($row != 0) {
                        while($ro = mysqli_fetch_assoc($query)){

                                        echo "<tr>";
                                        echo "<td>".$ro['series_no']."</td>";
                                        echo "<input type='text' style='display:none' name='series_no' value='".$ro['series_no']."'>";
                                        echo "<td>".$ro['name']."</td>";
                                        echo "<input type='date' style='display:none' name='name' value='".$ro['name']."'>";
                                        echo "<td>".$ro['ic_number']."</td>";
                                        echo "<input type='text' style='display:none' name='ic_number' value='".$ro['ic_number']."'>";
                                        echo "<td>".$ro['matric_no']."</td>";
                                        echo "<input type='text' style='display:none' name='matric_no' value='".$ro['matric_no']."'>";
                                        echo "<td>".$ro['course_code']."</td>";
                                        echo "<input type='text' style='display:none' name='course_code' value='".$ro['course_code']."'>";
                                        echo "<td>".$ro['faculty']."</td>";
                                        echo "<input type='text' style='display:none' name='faculty' value='".$ro['faculty']."'>";
                                        echo "<td>".$ro['address']."</td>";
                                        echo "<input type='text' style='display:none' name='address' value='".$ro['address']."'>";
                                        echo "<td>".$ro['phone_no']."</td>";
                                        echo "<input type='text' style='display:none' name='phone_no' value='".$ro['phone_no']."'>";
                                        $date = $ro['missDate'];
                                        $newDate = date('d/m/Y', strtotime($date));
                                        echo "<td>".$newDate."</td>";
                                        echo "<input type='date' style='display:none' name='missDate' value='".$ro['missDate']."'>";
                                        $time = $ro['missTime'];
                                        $newTime = date('h:i A', strtotime($time));
                                        echo "<td>".$newTime."</td>";
                                        echo "<input type='text' style='display:none' name='missTime' value='".$ro['missTime']."'>";
                                        echo "<td>".$ro['missPlace']."</td>";
                                        echo "<input type='text' style='display:none' name='missPlace' value='".$ro['missPlace']."'>";
                                        echo "<td>".$ro['missItem']."</td>";
                                        echo "<input type='text' style='display:none' name='missItem' value='".$ro['missItem']."'>";
                                        echo "<td>".$ro['report']."</td>";
                                        echo "<input type='text' style='display:none' name='report' value='".$ro['report']."'>";
                                        echo '<td><form method="POST"><button type="submit" name="printrfir" value='.$ro['series_no'].' formaction="pb05.php" class="btn btn-info">Print</button></form></td>';
                                        echo "</tr>";

                                            }
                                            }?>
                                            </tbody>
                                    </table>
                                    <?php

    echo "Data Saved";
    /*echo "<script type='text/javascript'>
          alert('Report Successfull Upload');
          setTimeout(window.location='pb05.php',2000);
          </script>";*/
  }
  else
  {
    echo "<script type='text/javascript'>
          alert('Problem with the report');
          setTimeout(window.location='fir.php',2000);
          </script>";
  }
}

?>
