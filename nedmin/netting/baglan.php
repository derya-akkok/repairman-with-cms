<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username="root";
$password="derya1035";
$sunucu="localhost";
$database="tamirci";

$baglan=mysqli_connect($sunucu,$username,$password);
mysqli_query($baglan,"SET NAMES UTF8");

if(!$baglan){
	echo "Baglanti hatasi: ".mysqli_error();
	exit();
}
$db=mysqli_select_db($baglan,$database);
if(!$db){
	echo "Veritabani hatasi: ".mysqli_error()."<br>";
	echo "Veritabani baglantisi bilgilerini baglan.php dosyasindan duzenleyebilirsiniz";
	exit();
}

function redirectUrl($fileName, $queryStringParameters){
	$queryString = [];
	foreach ($queryStringParameters as $key => $value) {
		$queryString[] = $key.'='.$value; 
	}

	header("Location:../".$fileName."?".implode('&', $queryString));
	exit;
}

function queryExecute($query){
	global $baglan;

	$affectedRow = 0;
	if (mysqli_query($baglan, $query) !== false) {
		$affectedRow = mysqli_affected_rows($baglan);
	}

	return $affectedRow;
}

?>