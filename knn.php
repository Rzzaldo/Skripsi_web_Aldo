<?php
$tgl=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$pro="simpan";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengujian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php

	$id_pengujian=$_GET["id"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
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
				$jenis_leasing=$d["jenis_leasing"];	
				
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
?>

<div class="panel-group m-bot20" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						  Info Data
					  </a>
				  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">

<form action="" method="post" enctype="multipart/form-data">

<table  class="table table-striped table-bordered table-hover" width="40%" >
<tr>
<th width="145"><label for="id_pengujian">ID Pengujian</label>
<th width="10">:
<th colspan="2"><b><?php echo $id_pengujian;?></b></tr>

<tr>
<td><label for="tgl">Tgl</label><td>:<td width="351"><?php echo $tgl;?>
</td>
</tr>

<tr>
<td height="24"><label for="jam">Jam</label><td>:<td>
<?php echo $jam;?></td>
</tr>


<tr>
<td height="24"><label for="id_customer">Customer</label>
<td>:<td><?php echo  getCustomer($conn,$id_customer);?>
  </td>
</tr>

<tr>
<td height="24"><label for="nama_pengujian">Nama Pengujian</label>
<td>:<td><<?php echo $nama_pengujian;?>
</td>
</tr>



<tr>
<td height="24"><label for="c1">Jumlah Pemasukkan Perbulan</label>
<td>:<td><?php echo $c1;?></td>
</tr>




<tr>
<td height="24"><label for="hasil_mobil">Hasil Mobil</label>
<td>:<td><?php echo $keterangan;?>
</td>
</tr>

</table>

</div>
</div>
 </div>
 
 
 
 
 <?php

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
					
			$pangkat=	pow(($arV1[$no]-$arV1[0]),2) + pow(($arV2[$no]-$arV2[0]),2) +  pow(($arV4[$no]-$arV4[0]),2) + pow(($arV5[$no]-$arV5[0]),2) + pow(($arV6[$no]-$arV6[0]),2);	
			$arT[$no]=round(sqrt($pangkat),2);
			
			$spangkat=	"($arV1[$no]-$arV1[0])<sup>2</sup> + ($arV2[$no]-$arV2[0])<sup>2</sup>  + ($arV4[$no]-$arV4[0])<sup>2</sup> + ($arV5[$no]-$arV5[0])<sup>2</sup> + ($arV6[$no]-$arV6[0])<sup>2</sup> ";
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

echo $gab0;
echo $gab1;
echo $gab2;
echo $gab3;
echo $gab4;
	?>








</div>

<?php
 function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }
	
	?>
