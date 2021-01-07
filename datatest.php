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
  $sql="select `id_pengujian` from `$tbpengujian` order by `id_pengujian` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PNG".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pengujian"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_pengujian=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$id_pengujian=$_GET["kode"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$tgl=WKT($d["tgl"]);
				$jam=$d["jam"];
				$id_customer=$d["id_customer"];
				$nama_pengujian=$d["nama_pengujian"];
				$no_perusahaan=$d["no_perusahaan"];
				$keterangan=$d["hasil_mobil"];				
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$c6=$d["c6"];
				$catatan=$d["catatan"];
				$jenis_leasing=$d["jenis_leasing"];
				$pro="ubah";		
}
?>

<div class="panel-group m-bot20" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						  Form Input Data Test Skill
					  </a>
				  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">

<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-striped table-bordered table-hover" width="40%" >
<tr>
<tr>

<td height="24"><label for="id_pengujian">ID Pengujian</label>
<td>:<td>
<select name="id_pengujian" id="id_pengujian">
  <option value="-">Pilih ID Pengujian</option>
  <?php
	  $s="select * from `$tbpengujian`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$id_pengujian0=$d["id_pengujian"];
	echo"<option value='$id_pengujian0' ";if($id_pengujian0==$id_pengujian){echo"selected";} echo">$id_pengujian0  </option>";
	}
	?>
</select>

</td>
</tr>



<td height="24"><label for="nama_pengujian">Nama Customer</label>
<td>:<td>
<select name="nama_pengujian" id="nama_pengujian">
  <option value="-">Pilih Nama Customer</option>
  <?php
	  $s="select * from `$tbpengujian`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$nama_pengujian0=$d["nama_pengujian"];
	echo"<option value='$nama_pengujian0' ";if($nama_pengujian0==$nama_pengujian){echo"selected";} echo">$nama_pengujian0  </option>";
	}
	?>
</select>

<tr>
<td height="24"><label for="hari">Hari Pengujian</label>
<td>:<td><input name="hari" type="hari" id="hari" value="<?php echo $hari;?>" size="20" /></td>
</tr>

<tr>
<td height="24"><label for="hari">Waktu Pengujian</label>
<td>:<td><input name="waktu_pengujian" type="timestamp" id="waktu_pengujian" value="<?php echo $hari;?>" size="20" /></td>
</tr>




<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-info" value="Simpan">
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_customer" type="hidden" id="id_customer" value="<?php echo $id_customer;?>" />
        <input name="id_customer0" type="hidden" id="id_customer0" value="<?php echo $id_customer0;?>" />
        <a href="?mnu=customer"><input name="Batal" type="button" class="btn btn-info" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

</div>
                </div>
              </div>


              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						  Lihat Data
					  </a>
				  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">

<br />
Data pengujian: 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-striped table-bordered table-hover" width="100%" border="0">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="31%">ID Pengujian</td>
    <th width="31%">Nama Customer</td>
    <th width="26%">Nama Pengujian</td>
    <th width="31%">Tgl Pengujian</td>
    <th width="26%">Waktu Pengujian</td>
    <th width="26%">No. Telp Perusahaan</td>
    <th width="26%">Hasil Mobil</td>
    <th width="31%">Gaji Perbulan</td>
    <th width="26%">Uang DP</td>
    <th width="6%">Kepemilikan Rumah</td>
    <th width="31%">Lama Kerja</td>
    <th width="26%">Jenis Mobil</td>
    <th width="26%">Catatan</td>
    <th width="26%">Jenis Leasing</td>
    <th width="25%">Aksi</td>
  </tr>
<?php  
  $sql="select * from `$tbpengujian` order by `id_pengujian` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_pengujian=$d["id_pengujian"];
				$tgl=WKT($d["tgl"]);
				$jam=$d["jam"];
				$id_customer=getCustomer($conn,$d["id_customer"]);
				$nama_pengujian=$d["nama_pengujian"];
				$no_perusahaan=$d["no_perusahaan"];
				$keterangan=$d["hasil_mobil"];
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$c6=$d["c6"];
				$catatan=$d["catatan"];
				$jenis_leasing=$d["jenis_leasing"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_pengujian</td>
				<td>$id_customer</td>
				<td>$nama_pengujian</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$no_perusahaan</td>
				<td>$hasil_mobil</td>
				<td>$c1</td>
				<td>$c2</td>
				<td>$c4</td>
				<td>$c5</td>
				<td>$c6</td>
				<td>$catatan</td>
				<td>$jenis_leasing</td>
				<td><div align='center'>
				
<a href='?mnu=knn&id=$id_pengujian'><img src='ypathicon/xls.png' alt='detail'></a>
<a href='?mnu=pengujian&pro=hapus&kode=$id_pengujian'><img src='ypathicon/ha.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data pengujian ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pengujian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pengujian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pengujian'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>

   </div>
                </div>
              </div>
            </div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_pengujian=strip_tags($_POST["id_pengujian"]);
	$id_pengujian0=strip_tags($_POST["id_pengujian"]);
	$tgl=BAL(strip_tags($_POST["tgl"]));
	$jam=strip_tags($_POST["jam"]);
	$id_customer=strip_tags($_POST["id_customer"]);
	$nama_pengujian=strip_tags($_POST["nama_pengujian"]);
	$no_perusahaan=strip_tags($_POST["no_perusahaan"]);
	$keterangan=strip_tags($_POST["hasil_mobil"]);
	$c1=strip_tags($_POST["c1"]);
	$c2=strip_tags($_POST["c2"]);
	$c4=strip_tags($_POST["c4"]);
	$c5=strip_tags($_POST["c5"]);
	$c6=strip_tags($_POST["c6"]);
	$catatan=strip_tags($_POST["catatan"]);
	
	
if($pro=="simpan"){
$sql=" INSERT INTO  `spk_mobkas`.`tbl_pengujian` (
`id_pengujian` ,
`tgl` ,
`jam` ,
`id_customer` ,
`nama_pengujian` ,
`no_perusahaan` ,
`hasil_mobil` ,
`c1` ,
`c2` ,
`c4` ,
`c5` ,
`c6` ,
`catatan`
)
VALUES (
'$id_pengujian',  '
$tgl',  
'$jam',  
'$id_customer',  '$nama_pengujian', '$nama_perusahaan',  '$keterangan',  '$c1',  '$c2',  '$c4',  '$c5',  '$c6',  '$catatan'
)";

	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_pengujian berhasil disimpan !');document.location.href='?mnu=pengujian';</script>";}
		else{echo"<script>alert('Data $id_pengujian gagal disimpan...');document.location.href='?mnu=pengujian';</script>";}
	}
	else{
	$sql="update `$tbpengujian` set `tgl`='$tgl',`jam`='$jam',`id_customer`='$id_customer' ,`nama_pengujian`='$nama_pengujian',`hasil_mobil`='$keterangan' where `id_pengujian`='$id_pengujian'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_pengujian berhasil diubah !');document.location.href='?mnu=pengujian';</script>";}
		else{echo"<script>alert('Data $id_pengujian gagal diubah...');document.location.href='?mnu=pengujian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pengujian=$_GET["kode"];
$sql="delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_pengujian berhasil dihapus !');document.location.href='?mnu=pengujian';</script>";}
	else{echo"<script>alert('Data $id_pengujian gagal dihapus...');document.location.href='?mnu=pengujian';</script>";}
}
?>

