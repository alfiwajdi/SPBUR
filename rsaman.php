<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPBUR</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php
    include("dbconn.php");
    session_start();
        if(isset($_SESSION['staff_ID']))
        {

        $sql0 = "SELECT * FROM staff WHERE staff_ID = ".$_SESSION['staff_ID']."";
        $query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));
        $r = mysqli_fetch_assoc($query0);

        }
    ?>

<div id="wrapper">
<?php include("DashboardOnly.php");?>
</body>
</html>
    <!-- Page Content -->
   <div id="page-wrapper">
                <div class="col-lg-14">
                    <br>
                    <h1>Laporan Saman Sahsiah Rupa Diri (SRD)</h1>
                    <br>
                        <!-- /.panel-heading -->
                <div class="row">
                    <div class="col-lg-14">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Laporan
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
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
                                        </thead>
                                        <tbody>

                    <?php

                    $sql = "SELECT * FROM kp";
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
                                        echo "<input type='date' style='display:none' name='summon_date' value='".$ro['summon_date']."'>";
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
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

<script src="datatables.net/js/jquery.dataTables.min.js"></script>
<script src="datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

</body>
</html>
