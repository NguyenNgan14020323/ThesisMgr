<?php 
$data4 = array();
function add_person($mabomon,$donvi,$tenbomon){
	global $data4;
	$data4[] = array('mabomon'=>$mabomon,'donvi'=>$donvi,'tenbomon'=>$tenbomon);
} 

if($_FILES['file4']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file4']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bien
			$mabomon = "";
			$donvi = "";
			$tenbomon = "";
			$index = 1;
			$cells = $row->getElementsByTagName('Cell');
			foreach ($cells as $cell) {
				$ind = $cell->getAttribute('Index');
				if($ind != null) $index = $ind;
				if($index == 1) $mabomon = $cell->nodeValue;
				if($index == 2) $donvi = $cell->nodeValue;
				if($index == 3) $tenbomon = $cell->nodeValue;
				$index += 1;
			}
			add_person($mabomon,$donvi,$tenbomon);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data4 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['mabomon'];
	$a2 = $row['donvi'];	
	$a3 = $row['tenbomon'];
	mysql_query("Insert into bomon(mabomon,donvi,tenbomon) values ('$a1','$a2','$a3')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>