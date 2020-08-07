<?php 
$koneksi = mysqli_connect("localhost","heydaans","@Heydaans19","importexcel");
include "excel_reader2.php";
session_start();
?>
<?php
$target = basename($_FILES['filemahasiswa']['name']) ;
move_uploaded_file($_FILES['filemahasiswa']['tmp_name'], $target);
chmod($_FILES['filemahasiswa']['name'],0777);
$data = new Spreadsheet_Excel_Reader($_FILES['filemahasiswa']['name'],false);
$jumlah_baris = $data->rowcount($sheet_index=0);
$berhasil = 1;
for ($i=2; $i<=$jumlah_baris; $i++){
	$nim     = $data->val($i, 1);
	$name    = $data->val($i, 2);
	$major   = $data->val($i, 3);
	$address = $data->val($i, 4);

	if($nim != "" && $name != "" && $major != "" && $address != ""){
		$koneksi = mysqli_connect("localhost","heydaans","@Heydaans19","importexcel");
		mysqli_query($koneksi,"INSERT into mahasiswa values('$nim','$name','$major','$address')");
		//$berhasil++;
		$_SESSION['info'] = $berhasil++;
	}
}
unlink($_FILES['filemahasiswa']['name']);
header("location:index.php?berhasil=$berhasil");
?>