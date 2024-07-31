<?php
include("project_db.php");
include("headerp.html");
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
/* *{
  box-sizing:border-box;
} */
body{
  font-family: 'Open Sans', sans-serif; 
  /* color:#333; 
  font-size:14px; 
  background-color:white; 
  padding:100px; */
}
.form_box{
  width:400px; 
  padding:10px; 
  background-color:white;
  margin: auto;
  margin-top: 20px;
}
input{
  padding:5px;  
  margin-bottom:5px;
}
input[type="submit"]{
  border:none; 
  outline:none; 
  background-color:#679f1b; 
  color:white;
}
.heading{
  background-color:#ac1219; 
  color:white; 
  height:40px; 
  width:100%; 
  line-height:40px; 
  text-align:center;
}
.shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
.pic{
  text-align:left; 
  width:33%; 
  float:left;
  }
</style>
<body>
 <div class="form_box shadow">
 <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
 <div class="heading">
   Feedback Form 
 </div>
 <br/>
 <p>What do you think about the quality of our website?</p>
 <div>
   <div class="pic">
     <img src="bad.png" alt=""> <br/>
     <input type="radio" name="quality" value="0"> Bad
   </div>
   <div class="pic">
     <img src="neutral.png" alt=""> <br/>
     <input type="radio" name="quality" value="1"> Okay
   </div>
   <div class="pic">
     <img src="good.png" alt=""> <br/>
     <input type="radio" name="quality" value="2"> Good
   </div>
 </div>
 
 <p>Do you have any suggestion for us? </p>
 <textarea name="suggestion" rows="8" cols="40"></textarea>
  <input type="submit" name="submit" value="Submit Form">
</form>
 </div>
</body>
</html>


<?php
if(isset($_POST["submit"])){
  
 $q_score = $_POST["quality"];
 $feedback_txt = $_POST["suggestion"];

 $query ="INSERT INTO `feedback_table` (`quality_score`, `feedback`) VALUES ('$q_score', '$feedback_txt')";

 $result = mysqli_query($conn, $query);
 if($result)
   echo 'Thank you for your feedback. We appreciate it!';
 else
    die("Something terrible happened. Please try again. ");

}

?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>