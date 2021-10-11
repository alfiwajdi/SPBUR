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
    <?php
    if(isset($_POST['updatebutton']));
    {
        $matric_no = $_POST['updatebutton'];
    }
    ?>

<div id="wrapper">
<?php include("DashboardOnly.php");?>
</body>
</html>
    <!-- Page Content -->
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sistem Pendaftaran Pelajar</h1>
            </div>
            <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Pelajar
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                        $sql = "SELECT * FROM student WHERE matric_no = '$matric_no' ";
                                        $query = mysqli_query($dbconn,$sql) or die ("Error: ". mysqli_error($dbconn));
                                        $row = mysqli_num_rows($query);
                                        if ($row != 0)
                                        {
                                            $r = mysqli_fetch_assoc($query);
                                        }
                                    ?>
                                    <form method="post" action="updStud1.php">

                                        <div class="form-group">
                                            <label>No Matriks</label>
                                            <input class="form-control" type="text" name="matric_no" value="<?php echo $r['matric_no'] ;?>" disabled>
                                            <p style="color:red"><b>*This value cannot be change.</b></p>
                                        </div>
                                        <div class="form-group" style="display:none">
                                                    <label for="disabledSelect">No Matriks</label>
                                                    <input name="matric_no" class="form-control" id="disabledInput" type="text" value="<?php echo $r['matric_no'] ;?>" >
                                        </div> <!-- Display Nothing But The Value Is There For Variable Purposed -->
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="name" value="<?php echo $r['name'] ;?>" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kad pengenalan</label>
                                            <input class="form-control" type="text" name="ic_number" value="<?php echo $r['ic_number'] ;?>" placeholder="without dash(-)" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Kursus/Jawatan</label>
                                          <select name="course_code" class="form-control" id="course_code" type="text" required>
                                              <?php
                                                  $sql5 = "SELECT course_code FROM student where matric_no = '$matric_no'";
                                                  $query5 = mysqli_query($dbconn, $sql5) or die("Error: " . mysqli_error($dbconn));
                                                  $ro = mysqli_num_rows($query5); // Count the record of table to see it's not empty
                                                      while($row = mysqli_fetch_assoc($query5)) {

                                                          echo "<option>".$row['course_code']."</option>";

                                                      }
                                              ?>

                                            <option value="CS110">CS110</option>
                                            <option value="CS111">CS111</option>
                                            <option value="AM110">AM110</option>
                                            <option value="BM111">BM111</option>
                                            <option value="BM119">BM119</option>
                                            <option value="BA111">BA111</option>
                                            <option value="BA119">BA119</option>
                                           </select>

                                        </div>
                                        <div class="form-group">
                                          <label>Fakulti/Bahagian</label>
                                          <select name="faculty" class="form-control" id="faculty" type="text" required>
                                              <?php
                                                  $sql5 = "SELECT faculty FROM student where matric_no = '$matric_no'";
                                                  $query5 = mysqli_query($dbconn, $sql5) or die("Error: " . mysqli_error($dbconn));
                                                  $ro = mysqli_num_rows($query5); // Count the record of table to see it's not empty
                                                      while($row = mysqli_fetch_assoc($query5)) {

                                                          echo "<option>".$row['faculty']."</option>";

                                                      }
                                              ?>
                                              <option value="FSKM">FSKM - Fakulti Sains Komputer & Matematik</option>
                                              <option value="FPP">FPP - Fakulti Sains Pentadbiran</option>
                                              <option value="FSPPP">FSPPP - Fakulti Sains Pentadbiran & Pengajian Polisi</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat/kolej</label>
                                            <input class="form-control" type="text" name="address" value="<?php echo $r['address'] ;?>" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telefon</label>
                                            <input class="form-control" type="text" name="phone_no" value="<?php echo $r['phone_no'] ;?>" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jantina</label>
                                            <select name="gender" class="form-control" id="gender" type="text" required>
                                                <?php
                                                    $sql5 = "SELECT gender FROM student where matric_no = '$matric_no'";
                                                    $query5 = mysqli_query($dbconn, $sql5) or die("Error: " . mysqli_error($dbconn));
                                                    $ro = mysqli_num_rows($query5); // Count the record of table to see it's not empty
                                                        while($row = mysqli_fetch_assoc($query5)) {

                                                            echo "<option>".$row['gender']."</option>";

                                                        }
                                                ?>
                                                    <option value="Lelaki">Lelaki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <br>
                                        <p style="color:red"><b>*Please leave untouch to information that does not need to be updated</b></p><br>
                                        <button class="btn btn-info" type="submit" name="updatebutton">Update</button>
                                        </form>
                                        <br>



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
