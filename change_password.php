<?php
include("project_db.php");
include("headerp.html");
include("password_standard.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Username</title>
  <style>
    .box{
      width: 400px;
      height: 150px;
      padding: 12px;
      background-color: blueviolet;
      color:white;
      font-family: Arial, Helvetica, sans-serif;
      
      margin:auto;

    }
    .box input {
      outline: none;
    }

    .Warning{
      color:red;
      font-weight: bold;
      text-align: center;
    }

    .button{
      padding :7px;
      border:none;
      border-radius:3px;
      background-color: lavender;
    }
    .button:hover{
      box-shadow: 5px 5px 10px rgba(0,0,0,0.15);
    }
    </style>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <div class="box"><label>Username:</label>
    <input type="text" name="username"><br><br>
    <label>Current password:</label>
    <input type="password" name="old_password"><br><br>
    <label>New Password:</label>
    <input type="password" name="new_password"><br><br>
    <input class=button type="submit" name="change" value="Change password">
    </div>
  </form>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username= filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
  $old_password= filter_input(INPUT_POST,"old_password",FILTER_SANITIZE_SPECIAL_CHARS);
  $new_password= filter_input(INPUT_POST,"new_password",FILTER_SANITIZE_SPECIAL_CHARS);
  $flag=standard($new_password);
  $result=validate_old_password($username,$old_password,$conn);
  if(empty($username)){
    echo '<div class="Warning">'. "<br>Please enter  username".'</div>';
  }

  elseif(empty($old_password)){
    echo '<div class="Warning">'."<br>Please enter current password".'</div>';
  }
  elseif(!$result){
    echo '<div class="Warning">'."<br>Incorrect current password".'</div>';
  }
  elseif(empty($new_password)){
    echo '<div class="Warning">'. "<br>Please enter new password".'</div>';
  }
  elseif($flag==0){
    echo '<div class="Warning">'."<br>Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
  }

else{
    change($username,$new_password,$old_password,$conn);
}
 
}

function change($username,$new_password,$old_password,$conn){
  $sql= "SELECT * FROM login WHERE user='$username' and password='$old_password'  ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $hash=password_hash($new_password,PASSWORD_DEFAULT);
  if(empty($row['user']) && empty($row['password'])){
    echo "Incorrect Username/Password";
  }
  else{
    $sql="UPDATE `calc_db`.`login` SET `password`='$hash' WHERE `user`='$username' AND `password`='$old_password'";
    mysqli_query($conn,$sql);
    echo "Your Password has been updated ";
  }
}
mysqli_close($conn);

?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>