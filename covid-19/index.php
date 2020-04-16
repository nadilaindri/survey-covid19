<?php 
include 'config/koneksi.php';
if (isset($_POST['mulai'])) {
	$sql = mysqli_query($con, "INSERT INTO tb_pengguna VALUES('$_POST[nama]','$_POST[usia]','$_POST[jk]','$_POST[alamat]')");
	if ($sql) {
	echo "<script>alert('Data Disimpan');document.location.href='soal.php';</script>";
	}else{
	echo "<script>alert('Gagal Disimpan')</script>";
	}
}
 ?>
<html>
<head>
    <title>Covid-19</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<form method="post">
<body background = "image/014804400_1580207821-benderaChinadiubah.jpg">
	<br>
        <table border=0 align="center" cellpadding=5 cellspacing=0>
            <tr>
                <td colspan=3><center><font size=8>Survey Covid-19</font></center></td>
            </tr>
            <tr>
                <td colspan=3><center><font size=5>Silahkan Daftar Terlebih Dahulu: </font></center></td>
            </tr>
            <tr>
                <td>Nama</td><td>:</td><td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Usia</td><td>:</td><td><input type="text" name="usia"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td><td>:</td><td><input type="text" name="jk"></td>
            </tr>
            <tr>
                <td>Alamat</td><td>:</td><td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td colspan=2>&nbsp;</td>
                <td><input type="submit" name="mulai" value="mulai" class="btn btn-primary"></td>
            </tr>
            <tr>
            </tr>
        <style type="text/css">
	table{
		border-radius: 10px;
		color:white;
		background:black;
		opacity: 0.7;
		position: absolute;
		top: 50%;
		left:50%;
		transform:translate(-50%,-50%);
	}
        </table>
</form>
</body>
</html>