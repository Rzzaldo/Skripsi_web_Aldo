<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

$cr1="Gaji";
$cr2="Tenor";
$cr4="Rumah";
$cr5="Lama Kerja";
$cr6="Jenis Mobil";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  

  <title>PANEL ADMINISTRATOR</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

  <section id="container" class="">
    <!--header start-->
    <header class="header red-bg">
      
      <!--logo start-->
      <a href="index.php" class="logo">UD. <span class="lite">Tambra Motor</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

        
        
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <?php
				if(isset($_SESSION["cid"])){	?>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="ypathfile/<?php echo $_SESSION["cgambar"]; ?>" width="40" height="40">
                            </span>
                            <span class="username"><?php echo $_SESSION["cnama"]; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                <a href="index.php?mnu=logout"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
          <?php } ?>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            
          </li>
						  <?php
				if(isset($_SESSION["cid"])){	
					  echo"
					  <li><a href='index.php?mnu=home'><i class='icon_house_alt'></i> <span>Home</span></a></li>
					  <li><a href='index.php?mnu=admin'><i class='fa fa-group'></i> <span>Admin</span></a></li>
					  <li><a href='index.php?mnu=customer'><i class='icon_profile'></i> <span>Customer</span></a></li>
					  <li><a href='index.php?mnu=mobil'><i class='fa fa-automobile'></i> <span>Mobil</span></a></li>
					  <li><a href='index.php?mnu=dataset'><i class='fa fa-align-justify'></i> <span>Dataset</span></a></li>
            <li><a href='datatest.php?mnu=datatest'><i class='fa fa-align-justify'></i> <span>Datatest</span></a></li>
					  
					  <li><a href='index.php?mnu=pengujian'><i class='fa fa-wrench'></i> <span>Pengujian</span></a></li>
					    <li><a href='index.php?mnu=hasil'><i class='fa fa-line-chart'></i> <span>Hasil</span></a></li>";
				}
				else{
					 echo"<li><a href='index.php?mnu=home'><i class='icon_house_alt'></i> <span>Home</span></a></li>";
					 echo"<li><a href='index.php?mnu=login'><i class='fa fa-user-circle-o'></i> <span>Login</span></a></li>";	 
					}
					  ?>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Selamat Datang Di Halaman Menu Admin!
              </header>
              <div class="panel-body">
					<?php 
					if($mnu=="admin"){require_once"admin/admin.php";}
					else if($mnu=="customer"){require_once"customer/customer.php";}
					else if($mnu=="mobil"){require_once"mobil/mobil.php";}
					else if($mnu=="pengujian"){require_once"pengujian/pengujian.php";}
					else if($mnu=="detail"){require_once"detail/detail.php";}
					else if($mnu=="hasil"){require_once"hasil/hasil.php";}
					else if($mnu=="dataset"){require_once"dataset/dataset.php";}

					else if($mnu=="login"){require_once"login.php";}
					else if($mnu=="logout"){require_once"logout.php";}
					else if($mnu=="knn"){require_once"knn.php";}
          else if($mnu=="datatest"){require_once"datatest.php";}
					else {require_once"home.php";}
									
					 ?>
              </div>
            </section>
            
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

        
        
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <p align="center"><b> Copyright &copy; by  UD. Tambra Motor | 2019 <b></p>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg 
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>-->
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>


<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>	


<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}
function getMobil($conn,$kode){
$field="nama_mobil";
$sql="SELECT `$field` FROM `tbl_mobil` where `id_mobil`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getCustomer($conn,$kode){
$field="nama_customer";
$sql="SELECT `$field` FROM `tbl_customer` where `id_customer`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	

	
function getV1($v){
	$h="-";
	if($v<=3000000){$h=0.3;}//"Kecil"
	else if($v<=5000000){$h=0.5;}//"Sedang";
	else if($v<=1000000){$h=0.7;}//"Besar";
	else {$h=0.9;}
	return $h;
}


function getV2($v){
	$h="-";
	if($v<=30){$h=="Kecil";}
	else if($v<=50){$h=="Sedang";}
	else {$h=="Besar";}
	return $v;
}
function getV4($v){
	$h="-";
	if($v=="Menumpang"){$h=0.3;}
	else if($v=="Rumah Sewa"){$h=0.5;}
	else if($v=="Rumah Sendiri"){$h=0.9;}
	return $h;
}
function getV5($v){
	$h="-";
	if($v<=3){$h="Kecil";}
	else if($v<=5){$h="Sedang";}
	else {$h="Besar";}
	return $v;
}
function getV6($v){
	$h=4;
	if($v=="SUV"){$h=7;}
	else if($v=="MPV"){$h=12;}
	else if($v=="City Car"){$h=4;}
	else if($v=="Hatchback"){$h=5;}
	else if($v=="Sedan"){$h=5;}
	return $h;
}
?>
