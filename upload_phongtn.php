<?php 
$data5 = array();
function add_person($mabomon,$sophong){
	global $data5;
	$data5[] = array('mabomon'=>$mabomon,'sophong'=>$sophong);
} 

if($_FILES['file5']['tmp_name']){
	$dom = DOMDocument::load($_FILES['file5']['tmp_name']);
	$rows = $dom->getElementsByTagName('Row');
	$first_row = true; //dang o dong dau tien trong file k chay
	foreach ($rows as $row) {
		if(!$first_row){//khong phai dong dau
			//set lai bie
			$mabomon = "";
			$sophong = "";
			$index = 1;
			$cells = $row->getElementsByTagName('Cell');
			foreach ($cells as $cell) {
				$ind = $cell->getAttribute('Index');
				if($ind != null) $index = $ind;
				if($index == 1) $mabomon = $cell->nodeValue;
				if($index == 2) $sophong = $cell->nodeValue;
				$index += 1;
			}
			add_person($mabomon,$sophong);
		}
		$first_row = false;
	}
}
?>
<?php 
foreach ($data5 as $row) {
	//du lieu 1 dong trong file neu rong o 1 o nao do thi se k import dc vao db
	require_once('connectdb.php');
	//neu du lieu rong chen vao 1 khoang trang
	$a1 = $row['mabomon'];
	$a2 = $row['sophong'];	
	mysql_query("Insert into phongtn(mabomon,sophong) values ('$a1','$a2')") or die(mysql_error()); 
}
echo "Import thanh cong!";

 ?>