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
    /* base flex */
    .flexCont
    {
      display: flex;
      flex-wrap: nowrap;
      flex-direction: column;
      width:800px;
      height: auto;
    }
    /*use for end item*/
    .flexItem
    {
      margin: 10px;
      flex-basis: 100%;
    }
    .flexItemBase
    {
      margin: 10px;
    }

    /*flex row */
    .flexRow
    {
      display: flex;
      flex-direction: row;
      flex-basis: 100%
    }
    .flexCol
    {
      display: flex;
      flex-direction: column;
      margin:10px;
    }
  </style>
  <?php
  include("dbconn.php");
  if(isset($_POST["matricPrint"]))
  {
    $sql0 = "SELECT * from kad WHERE series_no = ".$_POST['matricPrint']."";
    $sql1 = mysqli_query($dbconn,$sql0) or die ("Error: ".mysqli_error($dbconn));
    $data = mysqli_fetch_assoc($sql1);
    $series = $data['series_no'];
    $name = $data['name'];
    $matric = $data['matric_no'];
    $course = $data['prog_code'];
    $faculty = $data['faculty'];
    $college = $data['address'];
    $tel = $data['phone_no'];
    $currentdate = $data['currentdate'];
    $refer = $data['refer'];
    $validuntil = $data['validuntil'];
  }

   ?>
</head>
<?php 
                $date = $currentdate;
                $newDate = date('d/m/Y', strtotime($date));

                $date1 = $validuntil;
                $newDate1 = date('d/m/Y', strtotime($date1));
?>
<body style="font-family:Calibri; font-size:14;">
  <button id="print" onclick="printdiv('matric');">Print</button>
  <button onclick="location.href = 'rkadpelajar.php'">Back</button>
  <div id="matric">
    <div class="flexCont">
      <div class="flexCol">
        <div class="flexRow" style="align-items:center;justify-content:center;">
          <div class="flexItem">
            <img src="images\LogoUiTM_(color).jpg" style="width:250px;height:100px">
          </div>
          <div class="flexItem">
            <b>PEJABAT POLIS BANTUAN<br>UNIVERSITI TEKNOLOGI MARA (PAHANG)<br><br>
            <u>GANTIAN KAD PELAJAR</u></b>
          </div>
          <div class="flexItem">
            <img src="images\Lencana_PB_UiTM.jpg" style="width:100px;height:100px">
          </div>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexItem" style="justify-content:flex-end">
          No Siri :  C<u><b><?php echo $series; ?></b></u>
        </div>
      </div>
        <div class="flexCol">
          <div class="flexItem">
            Tarikh : <u><b><?php echo $newDate; ?></b></u>
          </div>
        </div>
    </div>
        <div>
          <p>Kepada sesiapa yang berkenaan</p>
          <p>Nama Pelajar <u><b><?php echo $name; ?></b></u></p>
          <p>No Pelajar UiTM / Kad Pengenalan <u><b><?php echo $matric;?></b></u></p>
          <p>Kursus <u><b><?php echo $course;?></b></u></p>
          <p>Fakulti  <u><b><?php echo $faculty;?></u></b></p>
          <p>Alamat Kolej Kediaman <u><b><?php echo $college;?></b></u></p>
          <p>No Telefon <u><b><?php echo $tel;?></b></u></p>

          <p>Adalah disahkan bahawa <b>Kad Pelajar</b> yang tersebut diatas:-</p>
          <p>1.Telah ditahan sementara untuk kesalahan tatatertib.</p>
          <p>2.Telah kehilangan dan menunggu penggantian. Salinan ini sah sehingga <u><b><?php echo $newDate1; ?></b></u></p>
          <p>Terima kasih.</p>

          <pre style="font-family:Calibri">
Yang menjalankan tugas,



.........................................
(                                       )
          </pre>
          <p>b/p Ketua Pejabat Polis Bantuan</p>
          <p>Universiti Teknologi MARA (Pahang) </p>

          <br>
          <p>Rujukan NO. Laporan PB 05: <u><b><?php echo $refer;?></b></u></p>
          <pre style="font-family:Calibri">
Nota :
          1.    Gantian Kad Pintar RM30.00 (Sila buat bayaran di Bahagian Bendahari).
          2.    Urusan membuat kad di <b>Info Tech</b>
          </pre>
          <p><b>Salinan Pertama : Penama</b></p>
        </div>
    </div>
  </div>

<body>
</html>
