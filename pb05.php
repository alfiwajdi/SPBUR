<html>
  <head>
    <script>
    function printdiv(printdivname)
      {
      var headstr = "<html><head><title>Summon Details</title></head><body>";
      var footstr = "</body>";
      var newstr = document.getElementById(printdivname).innerHTML;
      var oldstr = document.body.innerHTML;
      document.body.innerHTML = headstr+newstr+footstr;
      window.print();
      document.body.innerHTML = oldstr;
      return false;
      }
    </script>
    <style>
    .gridcont {
      display: grid;
      grid-template-columns: 375px 375px;
    }
    .grid-item {}
    .flexCont {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
    }
    .flexItem{
      flex-basis: 50%;
      flex-grow: 1;
    }

    .whitespace {
      display: grid;
      grid-template-rows: 350px 250px auto auto;
    }
    .wsitem {}

    td,th{
      border-left: 2px solid grey;
      border-right: 2px solid grey;
    }
    tr{
        border-bottom:  2px solid black;
        border-top: 2px solid black;
    }
    .main{
      font-family: Calibri;
      font-size: 15;
    }
    </style>

    <?php
    include("dbconn.php");
    if (isset($_POST['printrfir']))
    {
      $sql0 = "SELECT * from complain WHERE series_no = ".$_POST['printrfir']."";
      $sql1 = mysqli_query($dbconn,$sql0) or die ("Error: ".mysqli_error($dbconn));
      $data = mysqli_fetch_assoc($sql1);
      $name = $data['name'];
      $kp = $data['ic_number'];
      $matric = $data['matric_no'];
      $course = $data['course_code'];
      $faculty = $data['faculty'];
      $college = $data['address'];
      $lostDate = $data['missDate'];
      $lostTime = $data['missTime'];
      $lostPlace = $data['missPlace'];
      $lostReport = $data['report'];
      $lostItem = $data['missItem'];
      $reportDate = date("d/m/Y");
    }
      ?>
  </head>
  <body style="font-family:Calibri; font-size:14;">
    <button id="print" onclick="printdiv('print_pb05');">Print Summon</button>
    <button onclick="location.href = 'rfir.php'">Back</button>
    <div id="print_pb05">
      <div id="table_header">
        <table style = "background-color: rgb(234,241,221);border-collapse: collapse" width = "700" >
        <tbody>
          <tr>
            <td>
              <img src="images/PDRM_Logo.jpg" style="width:150px;height:150px;border:0;" align = "center" >
            </td>
            <td style= "font-family:calibri; font-weight:bold" rowspan="2" align = "center" width = "400">
              PEJABAT POLIS BANTUAN<p>Aduan Kehilangan Barang<br>Persendirian / UiTM
            </td>
            <td>
              <img src="images/Lencana_PB_UiTM.jpg" style="width:150px;height:150px;border:0;" align = "center" >
            </td>
          </tr>
          <tr>
          <td style = "border-top: 2px solid black; font-family:calibri; font-weight:bold; font-size: 16;" align = "center">
            UiTM Raub
          </td>
          <td style = "border-top: 2px solid black ;font-family:calibri; font-weight:bold; font-size: 16;" align = "center">
            PB 05
          </td>
        </tr>
      </table>
      </div><p>
      <div class="whitespace">
        <div class="wsitem">
        Nama                :<u><b><?php echo $name;?></b></u><br>
        No. Kad Pengenalan  :<u><b><?php echo $kp;?></b></u><br>
        No. KP UiTM         :<u><b><?php echo $matric;?></b></u><br>
        Kursus/Jawatan      :<u><b><?php echo $course;?></b></u><br>
        Fakulti/Bahagian    :<u><b><?php echo $faculty;?></b></u><br>
        Alamat/Kolej        :<u><b><?php echo $college;?></b></u><br>
        <div class="gridcont">
          <?php 
                $time = $lostTime;
                $newTime = date('h:i A', strtotime($time));

                $date = $lostDate;
                $newDate = date('d/m/Y', strtotime($date));
          ?>
        <div class="grid-item">Tarikh Hilang       :<u><b><?php echo $newDate;?></b></u></div>                     <div class="grid-item">Masa :<u><b><?php echo $newTime;?></b></u></div><br>
        </div>
        Tempat Kehilangan   :<u><b><?php echo $lostPlace;?></b></u><p>

        1.  Saya nama yang tersebut di atas ingin membuat laporan iaitu <br>
            &emsp;saya telah kehilangan barang-barang yang berikut :<br>
            <div class="gridcont">
              <div class="grid-item">
                <u><b><?php echo $lostItem; ?></b></u>
              </div>
            </div>
          <p>
        2.	Laporan ringkas bagaimana kehilangan berlaku.<br>
            <div class="wsitem"><u><b><?php echo $lostReport;?></b></u></div><br><br>


<div class="wsitem">
<pre class="main">
Sekian.

Tandatangan Pengadu                             Tandatangan Penerima Aduan



.............................................	             ..............................................
                                	                             (                                                  )




Bertarikh ...............................
</pre>
</div>
</div>
      </div>

      <div class="wsitem">
        <table style = "border-collapse: collapse" width = "700" >
          <tr>
            <td>
              Keluaran :
            </td>
            <td>
              Pindaan :
            </td>
            <td>
              Tarikh : <u><b><?php echo $reportDate;?></b></u>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
