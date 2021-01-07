<?php
  require_once"konmysqli.php";
    $file_path = "ypathfile/";
    
 $IMG=$_FILES['uploaded_file']['name'];
    $file_path = $file_path . basename( $IMG);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
  
  

  $actualpath = "http://192.168.1.16/1.MysqLI/masterCSS-android/ypathfile/$IMG";
  
  //$sql = "INSERT INTO tb_temp (path,nama) VALUES ('$actualpath','$IMG')";
  //mysqli_query($conn,$sql);
      
    } else{
        echo "fail";
    }
 ?>