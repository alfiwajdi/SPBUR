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

        $sql1 = "SELECT * FROM student WHERE matric_no = ".$_SESSION['matric_no']."";
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
                                    <div class="col-lg-6">
                                        <form role="form" method="post" action="kadpelajar3.php">
                                            <div class="panel-body">
                                                <p class="text-danger" disabled>NO: C011401 *Example</p>
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Tarikh</span>
                                                <input type="date" name="currentdate" class="form-control">
                                            </div>
                                            <br><label>Kepada sesiapa yang berkenaan</label><br>
                                            <div>
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">No Pelajar UiTM</span>
                                                    <input type="text" name="matric_no" class="form-control" value="<?php echo $r1['matric_no'] ;?>">
                                                </div>
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Nama Pelajar</span>
                                                <input type="text" name="name" class="form-control" value="<?php echo $r1['name'] ;?>">
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Kursus</span>
                                                <input type="text" name="prog_code" class="form-control" value="<?php echo $r1['prog_code'] ;?>">
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Fakulti</span>
                                                <input type="text" name="faculty" class="form-control" value="<?php echo $r1['faculty'] ;?>">
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Alamat Kolej Kediaman</span>
                                                <input type="text" name="address" class="form-control" value="<?php echo $r1['address'] ;?>">
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">No Telefon</span>
                                                <input type="text" name="phone_no" class="form-control" value="<?php echo $r1['phone_no'] ;?>">
                                            </div>
                                            <label>
                                            Anda disahkan bahawa Kad Pelajar yang tersebut yang tersebut diatas:-
                                            </label><br>
                                            <br><label>1. Telah ditahan sementara untuk kesalahan tatatertib.
                                            </label>
                                            <br><label>2. Telah hilang dan menungggu penggantian. Salinan ini sah sehingga</label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="validuntil" class="form-control">
                                                </div>

                                                <br><br><br><label>Terima Kasih</label>
                                                <br><label>Yang menjalankan tugas,</label>
                                                <br><br><br><br>
                                                <label>.................................................</label>
                                                <br><label>(________________________)</label>
                                                <br><br><label>b/p Ketua Pejabat polis Bantuan</label>
                                                <br><label>Universiti Teknologi MARA(Pahang)</label>
                                                <br><br>
                                                <label>Rujukan No. Lapran PB 05:</label><br>
                                                <div class="col-lg-6">
                                                    <input type="text" name="refer" class="form-control">
                                                </div>
                                                <br><br><br><br><label>Nota:</label>
                                                <br><label>1.  Gantian Kad Pintar RM30.00 (Sila buat bayaran di Bahagian Bendahari).</label>
                                                <br><label>2.  Urusan membuat kad di info Tech</label>
                                                <br><br><br><br>
                                                <label>Salinan Pertama : Penama</label><br>
                                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                                <button type="button" class="btn btn-default"><a href="kadpelajar.php">Go Back</a></button>
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
