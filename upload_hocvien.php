<?php 
//tao mat khau ngau nhien
function Password($length = 6){
	$pass ='';
	$poss = '123456789abcdfghjkmnpqrstvwxyz';
	$i = 0;
	while ($i<$length) {
		$pass .= substr($poss,mt_rand(0,strlen($poss)-1),1);
		$i++;
	}
	return $pass;
}	
$data1 = array();
function add_person($masv,$hoten,$khoahoc,$nganh,$vnuemail,$pass){
	global $data1;
	$data1[] = array('masv'=>$masv,'hoten'=>$hoten,'khoahoc'=>$khoahoc,'nganh'=>$nganh,'vnuemail'=>$vnuemail,'pass'=>$pass);
} 

if($_FILES['file1']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file1']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bien
			$macanbo = "";
			$hoten = "";
			$donvi = "";
			$vnuemail = "";
			$pass = "";
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
			$pass = Password(8);
			add_person($masv,$hoten,$khoahoc,$nganh,$vnuemail,$pass);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data1 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['masv'];
	$a2 = $row['hoten'];	
	$a3 = $row['khoahoc'];
	$a4 = $row['nganh'];
	$a5 = $row['vnuemail'];	
	$a6 = $row['pass'];
	mysql_query("Insert into hocvien(masv,hoten,khoahoc,nganh,vnuemail,pass) values ($a1,'$a2','$a3','$a4','$a5','$a6')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>