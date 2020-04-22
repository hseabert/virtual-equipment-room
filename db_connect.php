<?php
// mysql connection script

$host="ada.cc.gettysburg.edu";
$dbase="s20_seabha01";
$user="seabha01";
$pass="seabha01";

try{
	$db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);

}
catch(PDOException $e){
	die("Error connecting to MySQL database: "
		. $e->getMessage());
}

?>
