<?php

/* =============================================
 * Setting
 * ============================================= */

$baseUrl 	= "http://localhost/test/upload-files";
$roorDir	= dirname(dirname(__FILE__));
$uploadDir 	= "uploads";	

/* =============================================
 * Database
 * ============================================= */

$mode 		= 'PDO_MYSQL'; // MYSQL, PDO_MYSQL

$dbname 	= 'db_uploads';
$dbhost 	= 'localhost';
$dbuser 	= 'root';
$dbpass 	= '1234';
$character 	= 'utf8';

/* =============================================
 * Table 
 * ============================================= */

$tbl_image 		= 'tbl_image';
$tbl_images 	= 'tbl_images';

/* =============================================
 * Images 
 * ============================================= */

$imageBase64 = [
	'jpg'  => 'data:image/jpeg;base64,',
	'jpeg' => 'data:image/jpeg;base64,',
	'png'  => 'data:image/png;base64,',
];