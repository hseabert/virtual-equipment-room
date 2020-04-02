<?php 
include_once ('db_connect.php');
//by Tony Shi
function getAthleteData($db,$id)
{
  $array=array();
  //Get the athlete information by id number
  $q="SELECT * FROM athlete WHERE id=$id;";
  $qRes=$db->query($q);
  //store the information into an array and return the array
  while($r=$qRes->fetch_assoc())
  {
    $array['id']=$row['id'];
    $array['fname']=$row['fname'];
    $array['lname']=$row['lname'];
    $array['class']=$row['class'];
    $array['scode']=$row['scode'];
    $array['jnum']=$row['jnum'];
    $array['inum']=$row['inum'];
  }
   return $array;
}

?>

