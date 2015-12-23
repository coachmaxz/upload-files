<?php

include "include/setting.php";
include "include/connect.db.php";

if(!empty($_POST['Photo']['type']) && !empty($_POST['Photo']['source'])){
	$upload = str_replace($imageBase64[$_POST['Photo']['type']], '', $_POST['Photo']['source']);
	$filename = date('Y-m-d-H-i-s',time()) . '.' . $_POST['Photo']['type'];
    $path = $roorDir . '/' . $uploadDir  . '/' . $filename;
    file_put_contents($path, base64_decode($upload));
    if(file_exists($path)){
		if ($mode == 'MYSQL') {
			$sqlInsert = 'INSERT INTO ' . $tbl_image . ' (filename, create_at) ';
			$sqlInsert = 'VALUES ( "' . $filename . '", "' . date("Y-m-d H:i:s",time()) . '") ';
			$imageResult = mysql_query($sqlInsert, $conn) or die('Could not connect: ' . mysql_error());
			if (!empty($imageResult)) {
				echo '<a href="' . $baseUrl . '/' . $uploadDir . '/' . $filename . '" target="_blank">' . $filename . '</a>';  
			}
		}
		if ($mode == 'PDO_MYSQL') {
			$imageResult = $conn->prepare('INSERT INTO ' . $tbl_image . ' (filename, create_at) VALUES (:filename, :create_at) ');
			$imageResult->bindParam(':filename', $filename);
			$imageResult->bindParam(':create_at', date("Y-m-d H:i:s",time()));
			$imageResult->execute();
			if (!empty($imageResult)) {
				echo '<a href="' . $baseUrl . '/' . $uploadDir . '/' . $filename . '" target="_blank">' . $filename . '</a>';   
			}
		}
  	}
}

if(!empty($_POST['Photos'])){
	$rows = 0;
	$records = array();
	$views = array();
	$create_at = date('Y-m-d-H-i-s',time());
	$pathDir = $roorDir . '/' . $uploadDir  . '/';
	foreach($_POST['Photos'] as $record){
		$rows++;
		$upload = str_replace($imageBase64[$record['type']], '', $record['source']);
		$filename = $create_at . '-' . $rows . '.' . $record['type'] ;
		$path = $pathDir . $filename;
		file_put_contents($path, base64_decode($upload));
    	if(file_exists($path)){
			$records[] = $filename;
			$views[] = ' &nbsp;&nbsp;' . $rows . ' : <a href="'. $baseUrl . '/' . $uploadDir . '/' . $filename . '" target="_blank">' . $filename . '</a>';
		}
	}
	if(!empty($records)){
		if ($mode == 'MYSQL') {
			$files = $records;
			$sqlInsert = 'INSERT INTO ' . $tbl_images . ' (filename, create_at) ';
			$sqlInsert = 'VALUES ( "' . implode(",",$files) . '", "' . date("Y-m-d H:i:s",time()) . '") ';
			$imagesResult = mysql_query($sqlInsert, $conn) or die('Could not connect: ' . mysql_error());
			if (!empty($imagesResult)) {
				echo json_encode(array('records'=>$records,'views'=>$views));
			}
		}
		if ($mode == 'PDO_MYSQL') {
			$files = $records;
			$imagesResult = $conn->prepare('INSERT INTO ' . $tbl_images . ' (filename, create_at) VALUES (:filename, :create_at) ');
			$imagesResult->bindParam(':filename', implode(",",$files));
			$imagesResult->bindParam(':create_at', date("Y-m-d H:i:s",time()));
			$imagesResult->execute();
			if (!empty($imagesResult)) {
				echo json_encode(array('records'=>$records,'views'=>$views));
			}
		}
	}
}

include "include/disconnect.db.php";
exit();