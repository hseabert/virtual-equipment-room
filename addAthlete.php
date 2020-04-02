<?php
// connect to db
include_once("db_connect.php");

// get all values from $_POST
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$class=$_POST['class'];
$scode=$_POST['scode'];
$jnum=$_POST['jnum'];

//generate the query
$query= "INSERT INTO athlete(fname,lname,class,scode,jnum) VALUES('$fname','$lname','$class','$scode','$jnum';";

// query the db
$result=$db->query($query);

if($result != FALSE)
{
  print "<p>Sucessfully added $fname into athlete table </p>";
}
?>