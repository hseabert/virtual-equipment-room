<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #988c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
</tr>

<?php
//written by Tony Shi
include_once('db_connect.php');
$qStr = "SELECT * FROM worker;";
	$qRes = $db->query($qStr);

	if($qRes != FALSE){
	while($row = $qRes->fetch())
	{
		$id=$row['wid'];
		$fname=$row['fname'];
    $lname=$row['lname'];
		$str="<TR><TD>$id</TD><TD>$fname</TD><TD>$lname</TD></TR>\n";
		print $str;
	}
	}
?>
</table>
</body>
</html>