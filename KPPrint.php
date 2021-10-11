<!DOCTYPE html>
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
  if (isset($_POST["print"]))
  {
    $sql0 = "SELECT * from kp WHERE series_no = ".$_POST['print']."";
    $sql1 = mysqli_query($dbconn,$sql0) or die ("Error: ".mysqli_error($dbconn));
    $data = mysqli_fetch_assoc($sql1);
    $series_no = $data["series_no"];
    $name = $data["name"];
    $matric = $data["matric_no"];
    $ic = $data["mykad_no"];
    $program = $data["prog_code"];
    $date = $data["summon_date"];
    $time = $data["summon_time"];
    $violation = $data["summons"];
    
  }
  else {echo "fish";  }
  ?>
</head>

<body style="font-family:Calibri; font-size:14;">
  <button id="print" onclick="printdiv('summon');">Print Summon</button>
  <button onclick="location.href = 'rsaman.php'">Back</button>
  <div class="flexCont" id="summon">
    <div class="flexCol">
      <div class="flexRow" style="align-items:center;justify-content:center;">
        <div class="flexItemBase">
          <img src="images\LogoUiTM_(color).jpg" style="width:150px;height:50px">
        </div>
      </div>
    
    <div class="flexCol">
      <div class="flexRow">
        <div class="flexItem">
        &nbsp;&nbsp; Notis Kesalahan Pelajar
        </div>
      <div class="flexRow">
        <div class="flexItem">
          &nbsp;&nbsp;No. C<u><b><?php echo $series_no; ?></b></u>
          
        </div>
      </div>
    </div>
    <div class="flexCol">
      <div class="flexItem" >
        &nbsp;&nbsp;Nama: <u><b><?php echo $name; ?></b></u>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">
            KP: <u><b><?php echo $ic; ?></b></u>
          </div>
          <div class="flexItem">
            Matrik: <u><b><?php echo $matric;?></b></u>
          </div>
          <div class="flexItem">
            Program: <u><b><?php echo $program;?></b></u>
          </div>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">
            Tarikh: <u><b><?php echo $date;?></b></u>
          </div>
          <div class="flexItem">
            Masa: <u><b><?php echo $time; ?></b></u>
          </div>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">Kesalahan</div>
          <div class="flexItem"><u><b><?php echo $violation;?></div></b></u>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexItem">
          Kompaun ini hendaklah dijelaskan dalam tempoh 5 hari. Sekiranya tidak dijelaskan dalam tempoh yang ditetapkan, kadar maksimum boleh dikenakan.
          <br><br>Anda boleh manghadirkan diri atau mengaku kesalahan ini dengan surat kepada Pegawai Hal Ehwal Pelajar supaya kesalahan ini boleh di kompaunkan.<p><p>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">
                ............................................................................<br>
                Tandatangan Pelapor<br>
                Nama : <p>
                Pihak Berkuasa Tatatertib<br>
                b.p. Pegawai Hal Ehwal Pelajar
          </div>
          <div class="flexItem">
                ............................................................................<br>
                Tandatangan Pelajar
          </div>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">
            <label>Dibawah Kaedah 26A(1) Bahagian II, Jadual Kedua Akta 174, kesalahan ini boleh dikenakan kompaun tidak melebihi RM50.00 bagi setiap kesalahan. Anda dikehendaki membayar kompaun sebanyak </label>
            <b>RM............</b> sebelum <b>.....................</b> <label>. Jika kompaun ini tidak dijelaskan pada tarikh tersebut <br>mengikut Kaedah 64, Bahagian V, Jadual Kedua Akta 174(1976), tindakan menggantung dari menjadi pelajar UiTM akan diambil.</label>
          </div>
        </div>
      </div>
      <div class="flexCol">
        <div class="flexRow">
          <div class="flexItem">
            <label>.................................................</label>
            <br><label>Pegawai Hal Ehwal Pelajar</label>
          </div>
          <div class="flexItem">
            <label>.................................................</label><br>
            <label>Tarikh</label>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>


</div>

</body>
</html>
