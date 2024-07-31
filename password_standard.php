<?php
include("project_db.php");
function standard($password){
$number = preg_match('@[0-9]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
 
if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
  return 0;
} 
else {
 return 1;
}

}

function validate_old_password($username,$password,$conn){
  $sql= "SELECT * FROM login WHERE user='$username'  ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $verify=password_verify($password,$row['password']);
  return $verify;
}


?>