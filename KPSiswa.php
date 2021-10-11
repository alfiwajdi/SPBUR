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
                    <h1 class="page-header">Saman Sahsiah Rupa Diri (Siswa)</h1> 
                </div>
            </div>
            <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Student Found . <a href="KPCheck.php" class="alert-link">Click Here</a> to go back.
            </div>
                                    <div class="col-lg-6">
                                        <form role="form" method="post" action="KPSiswa1.php">
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Nama Pelajar</label>
                                                <input style="color:green" type="text" name="name" id="inputSuccess" class="form-control" value="<?php echo $r1['name'] ;?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">No Pelajar UiTM</label>
                                                <input style="color:green" type="text" name="matric_no" id="inputSuccess" class="form-control" value="<?php echo $r1['matric_no'] ;?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">No. Kad Pengenalan</label>
                                                <input style="color:green" type="text" name="ic_number" id="inputSuccess" class="form-control" value="<?php echo $r1['ic_number'] ;?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Kursus</label>
                                                <input style="color:green" type="text" name="course_code" id="inputSuccess" class="form-control" value="<?php echo $r1['course_code'] ;?>" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Tarikh</label>
                                                <input style="color:green" type="datetime" name="summon_date" id="inputSuccess" class="form-control" value="<?php echo $dateOnly ?>" >
                                                
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label" for="inputSuccess">Masa</label>
                                                <input style="color:green" type="datetime" name="summon_time" id="inputSuccess" class="form-control" value="<?php echo $timeOnly?>" >
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Tempat: </span>
                                                <input type="text" name="summon_place" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Dengan ini adalah diberitahu bahawa anda telah melakukan kesalahan seperti berikut: </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Siswa</label>
                                                <p class="form-control-static">1. Baju</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Baju- Jarang">1.1 Jarang
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Baju- Tidak berkolar pada waktu pejabat">1.2 Tidak berkolar pada waktu pejabat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Baju- Tidak dimasukkan kedalam seluar (baju jenis masuk ke dalam)">1.3 Tidak dimasukkan kedalam seluar (baju jenis masuk ke dalam)
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Baju- Tidak berlengan">1.4 Tidak berlengan
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Baju- Mempunyai tulisan, perkataan atau gambar liar/lucah">1.5 Mempunyai tulisan, perkataan atau gambar liar/lucah
                                                    </label>
                                                </div>
                                                <p class="form-control-static">2. Seluar</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Seluar- Memakai seluar pendek">2.1 Memakai seluar pendek
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Seluar- Ketat/Koyak/Lusuh/Jarang">2.2 Ketat/Koyak/Lusuh/Jarang
                                                    </label>
                                                </div>
                                                <p class="form-control-static">3. Kasut</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Kasut- Memakai selipar">3.1 Memakai selipar
                                                    </label>
                                                </div>
                                                <p class="form-control-static">4. Rambut</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Rambut- Panjang/Tidak kemas">4.1 Panjang/Tidak kemas
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Rambut- Mewarnakan rambut">4.2 Mewarnakan rambut
                                                    </label>
                                                </div>
                                                <p class="form-control-static">5. Pengunaan Perpustakaan</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Pengunaan Perpustakaan- Membuat Bising">5.1 Membuat Bising
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Pengunaan Perpustakaan- Ingkar arahan Pegawai Perpusatkaan">5.2 Ingkar arahan Pegawai Perpusatkaan
                                                    </label>
                                                </div>
                                                <p class="form-control-static">6. Kolej Kediaman</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Kolej Kediaman- Membuat Bising">6.1 Membuat Bising
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Kolej Kediaman- Bilik Kotor/Tidak kemas">6.2 Bilik Kotor/Tidak kemas
                                                    </label>
                                                </div>
                                                <p class="form-control-static">7. Kad Pelajar</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Kad Pelajar- Tidak membawa/gantung/pamer">7.1 Tidak membawa/gantung/pamer
                                                    </label>
                                                </div>
                                                <p class="form-control-static">8. Perhiasan Diri</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Perhiasan Diri- Memakai anting-anting/rantai/gelang/pamer">8.1 Memakai anting-anting/rantai/gelang/pamer
                                                    </label>
                                                </div>
                                                <p class="form-control-static">9. Tempat Tinggal/Tidur Dalam Kampus</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="summons[]" value="Tempat Tinggal/Tidur Dalam Kampus- Tidur di tempat yang tidak dibenarkan">9.1 Tidur di tempat yang tidak dibenarkan
                                                    </label>
                                                </div>
                                                <!--<p class="form-control-static">10. Lain Lain</p>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" ><input type="text" name="summons[]">
                                                    </label>
                                                </div>-->
                                            </div>
                                            <div class="form-group">
                                                <pre>Kompaun ini hendaklah dijelaskan dalam tempoh 5 hari. Sekiranya tidak dijelaskan dalam tempoh yang ditetapkan, kadar maksimum boleh dikenakan. <br><br>Anda boleh manghadirkan diri atau mengaku kesalahan ini dengan surat kepada Pegawai Hal Ehwal Pelajar supaya kesalahan ini boleh di kompaunkan.</pre>
                                                
                                                <br><br><label>Dibawah Kaedah 26A(1) Bahagian II, Jadual Kedua Akta 174, kesalahan ini boleh dikenakan kompaun tidak melebihi RM50.00 bagi setiap kesalahan.</label>
                                                <br><br><label>NOTA: SILA MAJUKAN SALNAN RESIT KEPADA PEJABAT POLIS BANTUAN UiTM UNTUK RUJUKAN</label>

                                            </div>
                                            
                                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Form</button>
                                            <br><br><br><br>
                                        </form>
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
