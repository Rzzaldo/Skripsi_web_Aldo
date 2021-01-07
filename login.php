<?php
session_start();
?>


<body class="login-img3-body">
	<br>
	<p align="center"><marquee><font size="6"> Please Login First..</p></marquee></font>
  <div class="container">

    <form class="login-form" method="post"  >
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="user">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        
		
	  
        <button class="btn btn-primary btn-lg btn-block" name="Login" type="submit">Login</button>
        <button class="btn btn-primary btn-lg btn-block" type="Reset" >Reset</button>
      </div>
    </form>
    
  </div>


</body>


<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' ";
		//$sql2="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["id_admin"];
				$nama=$d["nama_admin"];
				$gambar=$d["gambar"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cgambar"]=$gambar;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Admin";
		echo "<script>alert('Selamat Datang ".$_SESSION["cstatus"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") Anda berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		//elseif(getJum($conn,$sql2)>0){
			
		//	}
		else{
			session_destroy();
			echo "<script>alert('Proses Login Gagal ! Silakan cek username dan password yang anda ketikkan..');
			document.location.href='index.php?mnu=login';</script>";
		}
}


?>