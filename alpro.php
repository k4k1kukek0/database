<?php

//include & require

include_once("config.php");

                                 //ORDER BY = DIURUTKAN BERDASARKAN DATA TERBARU(DESC) KALO TERLAMA (ASC)
?>

<!DOCTYPE html>
<html>
<head>
	<title>alpro</title>
    <link rel="stylesheet" type="text/css" href="tampilan.css">
</head>
<body>
    <div>
        <img src="images.png" alt="checkbox" width="100" > 
    </div>

     <div>
         <h1>kegiatan</h1>
    </div>
        <br>
<form>
    <div>
        <select name='bulan'>
<?php 
//$mounth = ['januari','februari','maret','april','mei','juni','juli','agustus','september','okktober','november','desember']; 
for ($i=1; $i <= 12; $i++) { 
   //echo "<option value = $i name = 'bulan' > $mounth[$i]</option>" ;
   
    $bln=sprintf("%02d", $i);
    echo $bln."<br>";
   $string=strtotime(date('Y-').$bln.'-01');
   $tgl=date('F',$string);
   echo "<option value = '$i'  > $tgl</option>" ;
   
}?>
</select>

    <input type = "submit" name="ok" value = "ok"></input>
</div>

    </form> 

<?php for ($i=1; $i <= 31; $i++) { ?>
<div class ="kotak" >
    <form action = "simpan.php" method = "POST" >
<div>
    <label><h3><center><?php echo $i. date (' M ') .date("Y") ;?></center></h3></label> <hr>
</div>

<div>
              
                     <?php

                    //intinya selama data masih ada maka akan di tampilkan
                    //untuk menggunakan query di php menggunakan mysqli_query();
                    $result = mysqli_query($mysqli, "SELECT * FROM  kegiatan"); //ORDER BY id DESC");
                    
                    while($res = mysqli_fetch_array($result)) {

                        $k_id = $res['id'] ;
                        
                        $tanggal = date("Y-m") . "-" . $i ; 
                   
                    $c ='';
                        $result2 = mysqli_query($mysqli, "SELECT * FROM  keterangan WHERE kegiatan_id =$k_id AND kegiatan_tanggal='$tanggal'" );
                    while($res2 = mysqli_fetch_array($result2)) {
                            
                            if ( $res2['kegiatan_status'] == 'y') {
                                $c = 'checked' ;
                            }else {
                                $c = '' ;
                            }
                        }
                        ?>
                            
                        
                        <input type="hidden" name="tgl" value="<?=$tanggal ; ?>"> 

                        <input type="checkbox" name="id_k[] " <?=$c;?> value="<?=$res['id'] ;?>">
                        
                        <?php echo $res['kegiatan_nama'].'<br>' ;?>
               
                           <?php } ?>

      

</div>

<div>
    <input type="submit" name="tombol" value="ok">
</div>

    </form>
</div> 
<?php
 }
?>
			
</body>
</html>