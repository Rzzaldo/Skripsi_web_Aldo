<?php
require_once"konmysqli.php";

date_default_timezone_set("Asia/Jakarta");

$cr1="Gaji";
$cr2="Tenor";
$cr4="Rumah";
$cr5="Lama Kerja";
$cr6="Jenis Mobil";

$sql="select * from `$tbpengujian` order by `id_pengujian` desc";
if(isset($_GET["id"])){
	$id_pengujian=$_GET["id"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
}
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$tgl=WKT($d["tgl"]);
				$jam=$d["jam"];
				$id_customer=$d["id_customer"];
				$nama_pengujian=$d["nama_pengujian"];
				$keterangan=$d["hasil_mobil"];					
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$c6=$d["c6"];
				$catatan=$d["catatan"];
				
				
				$no=0;
				$arID[$no]="?";
				$arNM[$no]="?";
				$arC1[$no]=$c1;
				$arC2[$no]=$c2;
				$arC4[$no]=$c4;
				$arC5[$no]=$c5;
				$arC6[$no]=$c6;
				
				$arV1[$no]=getV1($c1);
				$arV2[$no]=getV2($c2);
				$arV4[$no]=getV4($c4);
				$arV5[$no]=getV5($c5);
				$arV6[$no]=getV6($c6);


	$sql="select * from `$tbdataset` order by `id_mobil` asc";							
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
				$no++;		
					$id=$d["id"];
					$id_mobil=$d["id_mobil"];
					$nm=getMobil($conn,$d["id_mobil"]);
					$c1=$d["c1"];
					$c2=$d["c2"];
					$c4=$d["c4"];
					$c5=$d["c5"];
					$c6=$d["c6"];
					
					$arID[$no]=$id_mobil;
					$arNM[$no]=$nm;
					$arC1[$no]=$c1;
					$arC2[$no]=$c2;
					$arC4[$no]=$c4;
					$arC5[$no]=$c5;
					$arC6[$no]=$c6;
					
					$arV1[$no]=getV1($c1);
					$arV2[$no]=getV2($c2);
					$arV4[$no]=getV4($c4);
					$arV5[$no]=getV5($c5);
					$arV6[$no]=getV6($c6);
					
			$pangkat=	pow(($arV1[$no]-$arV1[0]),2) + pow(($arV2[$no]-$arV2[0]),2) + pow(($arV4[$no]-$arV4[0]),2) + pow(($arV5[$no]-$arV5[0]),2) + pow(($arV6[$no]-$arV6[0]),2);	
			$arT[$no]=round(sqrt($pangkat),2);
			
			$spangkat=	"($arV1[$no]-$arV1[0])<sup>2</sup> + ($arV2[$no]-$arV2[0])<sup>2</sup> + ($arV4[$no]-$arV4[0])<sup>2</sup> + ($arV5[$no]-$arV5[0])<sup>2</sup> + ($arV6[$no]-$arV6[0])<sup>2</sup> ";
			$arS[$no]="$spangkat<sup>0.5</sup>";
			
			}//while
	
	
	
	
?>

<?php

$TAB=1;
$gab0="<div class='panel panel-default'>
<div class='panel-heading'>
<h4 class='panel-title'>
<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#collapse$TAB'>Lihat Data</a></h4></div>
<div id='collapse$TAB' class='panel-collapse collapse'>
<div class='panel-body'>

<table  class='table table-striped table-bordered table-hover' width='100%' border='0'>
  <tr bgcolor='#cccccc'>
    <th width='2%'>No</td>
    <th width='24%'>Mobil</td>
    <th width='5%'>$cr1</td>
	<th width='5%'>$cr2</td>
	<th width='5%'>$cr4</td>
	<th width='5%'>$cr5</td>
	<th width='5%'>$cr6</td>
  </tr>
";  

for($i=0;$i<$no;$i++){
	$color="#dddddd";		
	if($i %2==0){$color="#eeeeee";}
$gab0.="<tr bgcolor='$color'>
				<td>$i</td>
				<td>$arNM[$i]</td>
				<td>$arC1[$i]</td>
				<td>$arC2[$i]</td>
				<td>$arC4[$i]</td>
				<td>$arC5[$i]</td>
				<td>$arC6[$i]</td>
		</tr>";	
}
$gab0.="</table>
</div>
</div>
</div>
";
	





$TAB=2;
$gab1="<div class='panel panel-default'>
<div class='panel-heading'>
<h4 class='panel-title'>
<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#collapse$TAB'>Normalisasi Data</a></h4></div>
<div id='collapse$TAB' class='panel-collapse collapse'>
<div class='panel-body'>

<table  class='table table-striped table-bordered table-hover' width='100%' border='0'>
  <tr bgcolor='#cccccc'>
    <th width='2%'>No</td>
    <th width='24%'>Mobil</td>
    <th width='5%'>$cr1</td>
	<th width='5%'>$cr2</td>
	<th width='5%'>$cr4</td>
	<th width='5%'>$cr5</td>
	<th width='5%'>$cr6</td>
  </tr>
";  

for($i=0;$i<$no;$i++){
	$color="#dddddd";		
	if($i %2==0){$color="#eeeeee";}
$gab1.="<tr bgcolor='$color'>
				<td>$i</td>
				<td>$arNM[$i]</td>
				<td>$arV1[$i]</td>
				<td>$arV2[$i]</td>
				<td>$arV4[$i]</td>
				<td>$arV5[$i]</td>
				<td>$arV6[$i]</td>
		</tr>";	
}
$gab1.="</table>
</div>
</div>
</div>
";
	




$TAB=3;
$gab3="<div class='panel panel-default'>
<div class='panel-heading'>
<h4 class='panel-title'>
<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#collapse$TAB'>Perhitungan Jarak Eucledean  DIstance</a></h4></div>
<div id='collapse$TAB' class='panel-collapse collapse'>
<div class='panel-body'>

<table  class='table table-striped table-bordered table-hover' width='100%' border='0'>
  <tr bgcolor='#cccccc'>
    <th width='2%'>No</td>
    <th width='24%'>Mobil</td>
    <th width='50%'>Formula</td>
	<th width='5%'>Bobot</td>
  </tr>
";  

for($i=1;$i<$no;$i++){
	$color="#dddddd";		
	if($i %2==0){$color="#eeeeee";}
$gab3.="<tr bgcolor='$color'>
				<td>$i</td>
				<td>$arNM[$i]</td>
				<td>$arS[$i]</td>
				<td>$arT[$i]</td>
		</tr>";	
}
$gab3.="</table>
</div>
</div>
</div>
";
	



        $array_count = $no;
        for($x = 1; $x < $array_count; $x++){
            for($a = 1 ;  $a < $array_count - 1 ; $a++){
                if($a < $array_count ){
                    if($arT[$a] > $arT[$a + 1] ){
                            swap($arT, $a, $a+1);
							swap($arS, $a, $a+1);
							swap($arNM, $a, $a+1);
							swap($arID, $a, $a+1);
						
                    }
                }
            }
        }

	
	

$TAB=4;
$gab4="<div class='panel panel-default'>
<div class='panel-heading'>
<h4 class='panel-title'>
<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#collapse$TAB'>Perangkingan Jarak Eucledean </a></h4></div>
<div id='collapse$TAB' class='panel-collapse collapse'>
<div class='panel-body'>

<table  class='table table-striped table-bordered table-hover' width='100%' border='0'>
  <tr bgcolor='#cccccc'>
    <th width='2%'>No</td>
    <th width='24%'>Mobil</td>
    <th width='50%'>Formula</td>
	<th width='5%'>Bobot</td>
  </tr>
";  

process($conn,"delete from `tb_hasil` where id_pengujian='$id_pengujian'");

for($i=1;$i<$no;$i++){
	$color="#dddddd";		
	if($i %2==0){$color="#eeeeee";}
$gab4.="<tr bgcolor='$color'>
				<td>$i</td>
				<td>$arNM[$i]</td>
				<td>$arS[$i]</td>
				<td>$arT[$i]</td>
		</tr>";	
		
		
	$sql="INSERT INTO `tb_hasil` (`id_hasil`, `id_pengujian`, `id_mobil`, `rekapitulasi`, `bobot`, `ranking`, `keterangan`) VALUES 
	('', '$id_pengujian', '$arID[$i]', '$arS[$i]', '1$arT[$i]', '$i', 'Pengujian Vie Webserver');";	
	process($conn,$sql);
	
}
$gab4.="</table>
</div>
</div>
</div>
";

//echo $gab0;
//echo $gab1;
//echo $gab2;
//echo $gab3;
echo $gab4;
	?>



<?php
 function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
	
	?>
	
	
	
	
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
	else if($v<=10000000){$h=0.7;}//"Besar";
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

