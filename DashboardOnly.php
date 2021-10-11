<?php include("dbconn.php");?>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="Dashboard.php">SPBUR</a>
        </div>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="https://pahang.uitm.edu.my/v3/"><i class="fa fa-mortar-board fa-fw"></i>UiTM Pahang</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
                        <?php
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                            $autoDateTime = date('d/m/Y h:i:A');
                            $dateOnly = date('d/m/Y');
                            $timeOnly = date('h:i:A');
                        ?>
        <ul class="nav navbar-right navbar-top-links">
            <li>
                <lable style="color:white"><i class="fa fa-clock-o fa-fw"></i> <?php echo $timeOnly;?></lable>
            </li>
            <li>

            </li>
            <li>
                <lable style="color:white"><i class="fa fa-calendar fa-fw"></i> <?php echo $dateOnly;?></lable>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $r['staff_ID']; ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="signup.php"><i class="fa fa-gear fa-fw"></i> Add New User</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">

                    <li>
                        <a href="Dashboard.php" class=""><i class="fa fa-bookmark fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-group fa-fww"></i> Pelajar<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="rpelajar.php" class=""><i class="fa fa-list fa-fww"></i> Senarai Pelajar</a>
                            </li>
                            <li>
                                <a href="srs.php" class=""><i class="fa fa-plus-square-o fa-fww"></i> Sistem Pendaftaran Pelajar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Saman<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                        <a href="KPCheck.php">SRD</a>
                            </li>

                        </ul>


                    </li>

                    <li>
                        <a href="#"><i class="fa fa-clipboard fa-fw"></i> Laporan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                            	<li>
                                    <a href="fir.php">Aduan Awal (FIR)</a>
                                </li>
                                <li>
                                    <a href="kadpelajar.php">Kad Pelajar Hilang</a>
                                </li>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wpforms fa-fw"></i> Rekod <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="rfir.php">Aduan Awal(FIR)</a>
                            </li>
                            <li>
                                <a href="rkadpelajar.php">Kad Pelajar Hilang</a>
                            </li>
                            <li>
                                <a href="rsaman.php">Saman SRD</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="stat.php" class=""><i class="fa fa-bar-chart fa-fw"></i> Graf</a>
                    </li>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    	<a href="Usermanual.php" class=""><i class="fa fa-question-circle fa-fw"></i> UserManual (how-to-use)</a><br><br>
                    	<i class="fa fa-phone fa-fw"></i> 01123002898 (Izham)</a><br>
                    	<i class="fa fa-phone fa-fw"></i> 0102368052 (Ammar)</a><br>
                    	<i class="fa fa-phone fa-fw"></i> 0179896390 (Haziq)</a><br>
                    	<i class="fa fa-phone fa-fw"></i> 01111156511 (Afif)</a><br>



                    </li>
                </ul>

            </div>
        </div>
    </nav>
