<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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

        <!--PHP segement for tables and charts -->
        <?php
            include ("dbconn.php");
            function intToMonth ($int)
            {
              $int = $int - 1;
              $monthArr = array('January','Febuary','March','April','May','June','July','August','September','October','November','December');
              return $monthArr[$int];
            }
            function intToFac ($int)
            {
                $facArr = array('FSKM','FSPPP','FPP');
                return $facArr[$int];
            }
            $currentYear = date('Y');

            //php code for violations
            //get no. of violations per month
            $janCountVio=$febCounViot=$marCountVio=$aprCountVio=$mayCountVio=$junCountVio=$julCountVio=$augCountVio=$sepCountVio=$octCountVio=$novCountVio=$decCountVio=0;
            for ($i = 1;$i<=12;$i++)
            {
              $monthSQL = "SELECT * FROM kp WHERE month(summon_date) = '".$i."' and year(summon_date) = '".$currentYear."'";
              $monTest = mysqli_query($dbconn,$monthSQL);
              $summonDate = mysqli_fetch_assoc($monTest);
              if ($monTest == null)
              {
                $monCount = 0;
              }
              else
              {
                  $monCount = mysqli_num_rows($monTest);
              }
              if ($i == 1)      {$janCountVio = $monCount;}
              elseif ($i == 2)  {$febCountVio = $monCount;}
              elseif ($i == 3) {$marCountVio = $monCount;}
              elseif ($i == 4) {$aprCountVio = $monCount;}
              elseif ($i == 5) {$mayCountVio = $monCount;}
              elseif ($i == 6) {$junCountVio = $monCount;}
              elseif ($i == 7) {$julCountVio = $monCount;}
              elseif ($i == 8) {$augCountVio = $monCount;}
              elseif ($i == 9) {$sepCountVio = $monCount;}
              elseif ($i == 10) {$octCountVio = $monCount;}
              elseif ($i == 11) {$novCountVio = $monCount;}
              elseif ($i == 12) {$decCountVio = $monCount;}
            }
            $vioCountArr = array($janCountVio,$febCountVio,$marCountVio,$aprCountVio,$mayCountVio,$junCountVio,$julCountVio,$augCountVio,$sepCountVio,$octCountVio,$novCountVio,$decCountVio);
            $vioCount = '';
            $iterVio = 0;
            foreach($vioCountArr as $monthCount)
            {
                $month = intToMonth($iterVio);
                $vioCount .= "{a : '".$month."' , b : ". $monthCount."},";
                $iterVio++;
            }
            $vioCount = substr($vioCount,0,-1);

            //php code for lost matric cards
            //Get lost card per faculty
            $fskm = "SELECT * from kad where faculty LIKE '%FSKM%'and year(currentdate) = '".$currentYear."'";
            $fskmTest = mysqli_query($dbconn,$fskm);
            if ($fskmTest == null) {$fskmCount = 0;}
            else {$fskmCount = mysqli_num_rows($fskmTest);}
            $fsppp = "SELECT * from kad where faculty LIKE '%FSPPP%' and year(currentdate) = '".$currentYear."'";
            $fspppTest = mysqli_query($dbconn,$fsppp);
            if ($fspppTest == null) {$fspppCount = 0;}
            else {$fspppCount = mysqli_num_rows($fspppTest);}
            $business = "SELECT * from kad where faculty LIKE '%FPP%' and year(currentdate) = '".$currentYear."'";
            $businessTest = mysqli_query($dbconn,$business);
            if ($businessTest == null) {$businessCount = 0;}
            else {$businessCount = mysqli_num_rows($businessTest);}

            $facCountArr = array($fskmCount,$fspppCount,$businessCount);
            $iterFac = 0;
            $cardFacCount = '';
            foreach($facCountArr as $facCount)
            {
                $fac = intToFac($iterFac);
                $cardFacCount .= "{a : '".$fac."' , b : ". $facCount."},";
                $iterFac++;
            }
            $cardFacCount = substr($cardFacCount,0,-1);

            //get no. of lost matric card per month
            $janCountCard=$febCountCard=$marCountCard=$aprCountCard=$mayCountCard=$junCountCard=$julCountCard=$augCountCard=$sepCountCard=$octCountCard=$novCountCard=$decCountCard=0;
            for ($i = 1;$i<=12;$i++)
            {
              $monthSQL = "SELECT * FROM kad WHERE month(currentdate) = '".$i."' and year(currentdate) = '".$currentYear."'";
              $monTest = mysqli_query($dbconn,$monthSQL);
              $summonDate = mysqli_fetch_assoc($monTest);
              if ($monTest == null)
              {
                $monCount = 0;
              }
              else
              {
                  $monCount = mysqli_num_rows($monTest);
              }
              if ($i == 1){$janCountCard = $monCount;}
              elseif ($i == 2) {$febCountCard = $monCount;}
              elseif ($i == 3) {$marCountCard = $monCount;}
              elseif ($i == 4) {$aprCountCard = $monCount;}
              elseif ($i == 5) {$mayCountCard = $monCount;}
              elseif ($i == 6) {$junCountCard = $monCount;}
              elseif ($i == 7) {$julCountCard = $monCount;}
              elseif ($i == 8) {$augCountCard = $monCount;}
              elseif ($i == 9) {$sepCountCard = $monCount;}
              elseif ($i == 10) {$octCountCard = $monCount;}
              elseif ($i == 11) {$novCountCard = $monCount;}
              elseif ($i == 12) {$decCountCard = $monCount;}
            }
            $cardCountArr = array($janCountCard,$febCountCard,$marCountCard,$aprCountCard,$mayCountCard,$junCountCard,$julCountCard,$augCountCard,$sepCountCard,$octCountCard,$novCountCard,$decCountCard);
            $cardMonthCount = '';
            $iterCard = 0;
            foreach($cardCountArr as $monthCount)
            {
                $month = intToMonth($iterVio);
                $cardMonthCount .= "{a : '".$month."' , b : ". $monthCount."},";
                $iterCard++;
            }
            $cardMonthCount = substr($cardMonthCount,0,-1);
        ?>

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

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Graf/Statistik</h1>
                    </div>
                </div>
                <!-- ... Your content goes here ... -->
                <div class="row">
                    <!-- row for dash items -->
                    <div class="col-lg-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">Jumlah Saman Tahun <?php echo $currentYear;?></div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id='violations' style="height: 250px;">
                                    <script>
                                        Morris.Bar({
                                        element : 'violations',
                                        data:[
                                        <?php echo $vioCount ; ?>
                                        ],
                                        xkey: 'a',
                                        ykeys:['b'],
                                        labels:['Jumlah Kesalahan'],
                                        hideHover:'auto',
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    <!-- /.panel -->
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">Jumlah Kehilangan Kad Matrik (Fakulti) <?php echo $currentYear; ?></div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id='lostMatricFac' style="height: 250px;">
                                    <script>
                                        Morris.Bar({
                                        element : 'lostMatricFac',
                                        data:[
                                        <?php echo $cardFacCount ; ?>
                                        ],
                                        xkey: 'a',
                                        ykeys:['b'],
                                        labels:['Fakulti'],
                                        hideHover:'auto',
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">Jumlah Kehilangan Kad Matrik (Bulanan)  <?php echo $currentYear;?></div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id='lostMatricMonth' style="height: 250px;">
                                    <script>
                                        Morris.Bar({
                                        element : 'lostMatricMonth',
                                        data:[
                                        <?php echo $cardMonthCount ; ?>
                                        ],
                                        xkey: 'a',
                                        ykeys:['b'],
                                        labels:['Jumlah Kesalahan'],
                                        hideHover:'auto',
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- /.panel-body -->
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
