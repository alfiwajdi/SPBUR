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

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <h1>Senarai Pelajar</h1>
                    <br>
                    <form method="post" action="">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                        <div class="dataTables_length" id="dataTables-example_length">
                            <div class="row show-grid">
                            <div class="col-md-12">
                                <div class="col-md-3 col-md-offset-9"> 
                                        <input  type="text" name="matric_no"> 
                                        <input  type="submit" name="submit" value="Search"> 
                                </div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nombor Matriks</th>
                                                <th>Nama</th>
                                                <th>Kad Pengenalan</th>
                                                <th>Kod Program</th>
                                                <th>Fakulti</th>
                                                <th>Alamat</th>
                                                <th>No Telefon</th>
                                                <th>Tarikh Lahir</th>
                                                <th>Jantina</th>
                                            </tr>
                                        </thead>

                    <?php 
							include("rpelajar0.php");
                            $sql0 = "SELECT * FROM student"; 
                            $query0 = mysqli_query($dbconn, $sql0) or die ("Error: ".mysqli_error($dbconn));
                            $row=mysqli_fetch_array($query0);
                            if($row){
                            
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>".$row['matric_no']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['ic_number']."</td>";
                                        echo "<td>".$row['course_code']."</td>";
                                        echo "<td>".$row['faculty']."</td>";
                                        echo "<td>".$row['address']."</td>";
                                        echo "<td>".$row['phone_no']."</td>";
                                        echo "<td>".$row['birthdate']."</td>";
                                        echo "<td>".$row['gender']."</td>";
                                        echo "</tr>";
                               
                        }?>
                                        
                                    </table> 
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </form>
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                            <div class="input-group custom-search-form">
                                                <input type="text" name="matric_no" class="form-control" placeholder="Matric Number" >
                                                    <span class="input-group-btn">
                                                        <button formaction="updStud.php" class="btn btn-warning" type="submit">Update</button>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <button formaction="delStud.php" class="btn btn-danger" type="submit">Delete</button>
                                                    </span>
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

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
