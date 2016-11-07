<?php 
$data6 = array();
function add_person($madetai,$macanbo,$tendetai){
	global $data6;
	$data6[] = array('madetai'=>$madetai,'macanbo'=>$macanbo,'tendetai'=>$tendetai);
}

if($_FILES['file6']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file6']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bien
			$madetai = "";
			$macanbo = "";
			$tendetai = "";
			$index = 1;
			$cells = $row->getElementsByTagName('Cell');
			foreach ($cells as $cell) {
				$ind = $cell->getAttribute('Index');
				if($ind != null) $index = $ind;
				if($index == 1) $madetai = $cell->nodeValue;
				if($index == 2) $macanbo = $cell->nodeValue;
				if($index == 3) $tendetai = $cell->nodeValue;
				$index += 1;
			}
			add_person($madetai,$macanbo,$tendetai);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data6 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['madetai'];
	$a2 = $row['macanbo'];	
	$a3 = $row['tendetai'];
	mysql_query("Insert into detai(madetai,macanbo,tendetai) values ('$a1','$a2','$a3')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>