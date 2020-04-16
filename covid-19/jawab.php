<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background = "image/covid_13.jpg">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
</body>
</html>

<?php
// koneksi ke mysqli
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_covid";
// Create connection
$koneksi = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$koneksi) {
die("Connection failed: " . mysqli_connect_error());
}


       if(isset($_POST['submit'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($koneksi, "select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=mysqli_query($koneksi, "select * from tbl_soal WHERE aktif='Y'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
            }
        }

        //Lakukan Penyimpanan Kedalam Database

         echo "
        <center><table>
        <tr><td>Hasil Jawaban Anda</td><td></td></tr>
         
        </table></div></center>";
      echo "
       <center> <table>
         <tr><td>Jumlah Jawaban Ya</td><td>  : $benar </td></tr>
         
        </table></div></center>";

        if ($benar <= 7) {
      echo "
        <center><table>
         <tr><td>Resiko rendah</td><td>  </td></tr>
         
        </table></div></center>";    
    }
        Else if ($benar <= 8) {
      echo "
        <center><table>
         <tr><td>Resiko sedang</td><td>  </td></tr>
         
        </table></div><center>";    
    }
         Else if ($benar <= 21) {
      echo "
        <center><table>
         <tr><td>Resiko tinggi</td><td>  </td></tr>
         
        </table></div></center>";    
        }
        ?>


 


