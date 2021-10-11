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

        $sql1 = "SELECT * FROM complain WHERE series_no = ".$_SESSION['series_no']."";
        $query1 = mysqli_query($dbconn, $sql1) or die ("Error: ".mysqli_error($dbconn));
        $r1 = mysqli_fetch_assoc($query1);
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
                    <h1 class="page-header">Gantian Kad Pelajar</h1> 
                </div>
            </div>
            <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Student Found . <a href="fir.php" class="alert-link">Click Here</a> to go back.
            </div>

                                    <div class="col-lg-6">
                                        <form role="form" method="post" action="kadpelajar3.php">
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Tarikh</label>
                                                <input type="date" name="currentdate" id="inputSuccess" class="form-control" value="<?php echo $r1['missDate'] ;?>" >
                                                <p style="color:grey"><b>mm/dd/yyyy</b></p>
                                            </div>
                                            <br><label>Kepada sesiapa yang berkenaan</label><br><br>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">No Pelajar UiTM</label>
                                                <input type="text" name="matric_no" id="inputSuccess" class="form-control" value="<?php echo $r1['matric_no'] ;?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Nama Pelajar</label>
                                                <input type="text" name="name" id="inputSuccess" class="form-control" value="<?php echo $r1['name'] ;?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Kursus</label>
                                                <input type="text" name="course_code" id="inputSuccess" class="form-control" value="<?php echo $r1['course_code'] ;?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Fakulti</label>
                                                <input type="text" name="faculty" id="inputSuccess" class="form-control" value="<?php echo $r1['faculty'] ;?>">
                                                </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Alamat Kolej Kediaman</label>
                                                <input type="text" name="address" id="inputSuccess" class="form-control" value="<?php echo $r1['address'] ;?>">
                                                </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">No. Telefon</label>
                                                <input type="text" name="phone_no" id="inputSuccess" class="form-control" value="<?php echo $r1['phone_no'] ;?>">
                                            </div>
                                            <label>
                                            Anda disahkan bahawa Kad Pelajar yang tersebut yang tersebut diatas:-
                                            </label><br>
                                            <br><label>1. Telah ditahan sementara untuk kesalahan tatatertib.
                                            </label>
                                            <br><label>2. Telah hilang dan menungggu penggantian. Salinan ini sah sehingga</label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="validuntil" class="form-control" required>
                                                </div>
                                                <br><br><br><br>
                                                <label>Rujukan No. Laporan PB 05:</label>
                                                <div class="form-group has-success">
                                                    <div class="col-lg-6">
                                                    <label class="control-label" for="inputSuccess"></label>
                                                    <input type="text" name="refer" id="inputSuccess" class="form-control" value="<?php echo $r1['series_no'] ;?>">
                                                    </div>
                                                </div>
                                                
                                                <br><br><br><br><label>Nota:</label>
                                                <br><label>1.  Gantian Kad Pintar RM30.00 (Sila buat bayaran di Bahagian Bendahari).</label>
                                                <br><label>2.  Urusan membuat kad di info Tech</label>
                                                <br><br><br><br>
                                                <label>Salinan Pertama : Penama</label><br>
                                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                                <button  type="submit" class="btn btn-default" formaction="kadpelajar.php"><a href="kadpelajar.php">Go Back</a></button>
                                                <br><br><br><br>
                                            </form>
                                        </div>
                                    </div>
                                    </div>

            <!-- ... Your content goes here ... -->
            

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
