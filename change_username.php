<?php
include("project_db.php");
include("headerp.html"); 
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
      background-color: black;
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
      padding:7px;
    }
    </style>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <div class="box"><label>Enter current username:</label>
    <input type="text" name="old_username"><br><br>
    <label>Enter password:</label>
    <input type="password" name="password"><br><br>
    <label>Enter new Username:</label>
    <input type="text" name="new_username"><br><br>
    <input class="button" type="submit" name="change" value="Change Username">
    </div>
  </form>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $old_username= filter_input(INPUT_POST,"old_username",FILTER_SANITIZE_SPECIAL_CHARS);
  $password= filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  $new_username= filter_input(INPUT_POST,"new_username",FILTER_SANITIZE_SPECIAL_CHARS);
  if(empty($old_username)){
    echo '<div class="Warning">'. "<br>Please enter current username".'</div>';
  }

  elseif(empty($password)){
    echo '<div class="Warning">'."<br>Please enter password".'</div>';
  }

  elseif(empty($new_username)){
    echo '<div class="Warning">'. "<br>Please enter new username".'</div>';
  }

else{
  if(isset($_POST["change"])){

    change($old_username,$new_username,$password,$conn);
  
  }
}
 
}

function change($old_username,$new_username,$password,$conn){
  $sql= "SELECT * FROM login WHERE user='$old_username' and password='$password'  ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  if(empty($row['user']) && empty($row['password'])){
    echo "Incorrect Username/Password";
  }
  else{
    $sql="UPDATE `calc_db`.`login` SET `user`='$new_username' WHERE `user`='$old_username' AND `password`='$password'";
    mysqli_query($conn,$sql);
    echo "Your new username is $new_username";
  }
}
mysqli_close($conn);

?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>