<?php
include("project_db.php");
include("password_standard.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
    form{
      display:flexbox;
      padding:10px;
      background-color: blueviolet;
      height: 175px;
      width: 335px;
      border-radius: 5px;

    }

    .label{
      /* background-color: grey; */
      padding-bottom:5px;
      font-size: 14px;
      
    }

    .box-content{
      height:20px;
      width: 290px;
      padding-bottom: 5px;
      outline: none;
      border-radius: 5px;
      border-color: wheat;
    }

    .button{
      background-color: pink;
      border:none;
      padding:8px;
      border-radius: 20px;
      color:purple;
    }

    .button:hover{
      box-shadow: 5px 5px 10px rgba(0,0,0,0.15);
    }

    .Warning{
      color:red;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>
  <div style="display:flex;
  justify-content:center;
  margin-top:100px;">
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label class="label">Username:</label><br>
    <input class="box-content" type="text" name="username"><br>
    <label class="label">Password:</label><br>
    <input class="box-content" type="password" name="password"><br><br>
    <input class="button" type="submit" name="submit" value="Register">
    <input class="button" type="submit" name="login" value="Login"> 
  </form>
  </div>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username= filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
  $password= filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  $flag=standard($password);
  if(empty($username)){
    echo '<div class="Warning">'. "<br>Please enter username".'</div>';
  }

  elseif(empty($password)){
    echo '<div class="Warning">'."<br>Please enter password".'</div>';
  }
  elseif($flag==0){
    echo '<div class="Warning">'."<br>Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";

  }
  
else{
  if(isset($_POST["submit"]) && $flag==1){
  register($username,$password,$conn);
}
  else{
    login($username,$password,$conn);
  }
}
 unset($_POST);
 unset($_REQUEST);
// //header('Location:login.php');
// header('Location: ' . $_SERVER['HTTP_REFERER']); //die();


}

function register($username,$password,$conn){
  if(isset($_POST["submit"])){
    $hash=password_hash($password,PASSWORD_DEFAULT);
      $sql="INSERT INTO login (user,password)
      VALUES ('$username','$hash')";
      //try{
        mysqli_query($conn,$sql);
        echo '<div class="Warning">'."<br>User is registered<br>Login to use calculator".'</div>';
        //}
        //catch(mysqli_sql_exception $e){
          //echo "User already exists";}
}}


function login($username,$password,$conn){

   $sql= "SELECT * FROM login WHERE user='$username'  ";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $verify=password_verify($password,$row['password']);
   if($username==$row['user'] && $verify)
   {
    header("Location: project.php");
   }
   else{
    echo '<div class="Warning">'."<br>Invalid Username/Password".'</div>';
   }
  
}

mysqli_close($conn);

?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>