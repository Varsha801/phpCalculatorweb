<?php

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="calc_db";
//$GLOBALS['conn'];


//exceptiion handling 


  $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if(!$conn){
  echo "Server error";
}

// else{
//   echo "You are not connectedM<br>";
// }


?>