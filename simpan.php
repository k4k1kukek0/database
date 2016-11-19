<?php
        //coba berhasil apa tidak
            //    echo "<pre>" .print_r($_POST, 1)."<pre>" ;

            include_once("config.php");
        $tgl = $_POST ['tgl'] ;
        $sql = "INSERT INTO keterangan VALUES " ;
// $sql = "INSERT INTO keterangan  WHERE kegiatan_id =$value AND kegiatan_tanggal='$tgl' " ;
// $sql2 = "UPDATE keterangan SET keterangan WHERE kegiatan_id =$value AND kegiatan_tanggal='$tgl' " ;


    foreach ($_POST['id_k'] as $key => $value) 
//         if  (mysqli_fetch_row(mysqli_query("SELECT * FROM  keterangan WHERE kegiatan_id =$value AND kegiatan_tanggal='$tgl'"))) {
//                  echo $sql ;
//        }else{
//                 echo $sql2 ;
//        } 
        // echo $key . ":" . $value ;
            $sql=$sql."(null, '$value', 'y', '$tgl', '')," ;
   // }

$sql = substr($sql,0,-1) ;
    echo $sql ;
mysqli_query($mysqli,$sql) or die ('gagal simpan'.mysqli_error());        


header('Location:alpro.php') ;

             

    
    
    ?>


</html>