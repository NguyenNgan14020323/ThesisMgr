<?php 
$data3 = array();
function add_person($donvi,$tenkhoa,$vanphongkhoa){
	global $data3;
	$data3[] = array('donvi'=>$donvi,'tenkhoa'=>$tenkhoa,'vanphongkhoa'=>$vanphongkhoa);
}

if($_FILES['file3']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file3']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bien
			$donvi = "";
			$tenkhoa = "";
			$vanphongkhoa = "";
			$index = 1;
			$cells = $row->getElementsByTagName('Cell');
			foreach ($cells as $cell) {
				$ind = $cell->getAttribute('Index');
				if($ind != null) $index = $ind;
				if($index == 1) $donvi = $cell->nodeValue;
				if($index == 2) $tenkhoa = $cell->nodeValue;
				if($index == 3) $vanphongkhoa = $cell->nodeValue;
				$index += 1;
			}
			add_person($donvi,$tenkhoa,$vanphongkhoa);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data3 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['donvi'];
	$a2 = $row['tenkhoa'];	
	$a3 = $row['vanphongkhoa'];
	mysql_query("Insert into khoa(donvi,tenkhoa,vanphongkhoa) values ('$a1','$a2','$a3')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>