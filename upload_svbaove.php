<?php 
$data2 = array();
function add_person($masv,$hoten,$khoahoc,$nganh,$vnuemail){
	global $data2;
	$data2[] = array('masv'=>$masv,'hoten'=>$hoten,'khoahoc'=>$khoahoc,'nganh'=>$nganh,'vnuemail'=>$vnuemail);
} 

if($_FILES['file2']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file2']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bien
			$macanbo = "";
			$hoten = "";
			$donvi = "";
			$vnuemail = "";
			$index = 1;
			$cells = $row->getElementsByTagName('Cell');
			foreach ($cells as $cell) {
				$ind = $cell->getAttribute('Index');
				if($ind != null) $index = $ind;
				if($index == 1) $masv = $cell->nodeValue;
				if($index == 2) $hoten = $cell->nodeValue;
				if($index == 3) $khoahoc = $cell->nodeValue;
				if($index == 4) $nganh = $cell->nodeValue;
				if($index == 5) $vnuemail = $cell->nodeValue;

				$index += 1;
			}
			add_person($masv,$hoten,$khoahoc,$nganh,$vnuemail);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data2 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['masv'];
	$a2 = $row['hoten'];	
	$a3 = $row['khoahoc'];
	$a4 = $row['nganh'];
	$a5 = $row['vnuemail'];	
	mysql_query("Insert into svbaove(masv,hoten,khoahoc,nganh,vnuemail) values ($a1,'$a2','$a3','$a4','$a5')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>