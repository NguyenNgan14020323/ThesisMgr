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
$data = array();
function add_person($macanbo,$hoten,$donvi,$vnuemail,$pass){
	global $data;
	$data[] = array('macanbo'=>$macanbo,'hoten'=>$hoten,'donvi'=>$donvi,'vnuemail'=>$vnuemail,'pass'=>$pass);
} 

if($_FILES['file']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file']['tmp_name']);
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
				if($index == 1) $macanbo = $cell->nodeValue;
				if($index == 2) $hoten = $cell->nodeValue;
				if($index == 3) $donvi = $cell->nodeValue;
				if($index == 4) $vnuemail = $cell->nodeValue;
				$index += 1;
			}
			$pass = Password(8);
			add_person($macanbo,$hoten,$donvi,$vnuemail,$pass);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['macanbo'];
	$a2 = $row['hoten'];	
	$a3 = $row['donvi'];
	$a4 = $row['vnuemail'];	
	$a5 = $row['pass'];
	mysql_query("Insert into giangvien(macanbo,hoten,donvi,vnuemail,pass) values ($a1,'$a2','$a3','$a4','$a5')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>