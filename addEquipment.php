<?php
include_once("db_connect.php");

//Get all the fields filled in the form

$type=$_POST['type'];
$eq_size=$_POST['eq_size'];
$color=$_POST['color'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$lock_num=$_POST['lock_num'];

//generate the query

$query= "INSERT INTO equipment(type,eq_size,color,brand,model,lock_num) VALUES('$type','$eq_size','$color','$brand','$model',$lock_num);";

//send the query to the data base;
//print "<P>$query</P>\n";
$result=$db->query($query);

if($result != FALSE)
{
  print "<p>Sucessfully added $type into equipment table </p>";
}
?>