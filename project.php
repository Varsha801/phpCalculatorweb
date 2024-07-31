<?php
  //include
include("headerp.html");  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
.lable{
  color:blueviolet;
  
  display: block;
  font-weight: bold;
  font-size: large;
  padding: 5px;
}
.entry{
  background-color: lightcoral;
  text-align: center;
  margin-bottom:0; 
}
.text-box{
  height: 20px;
  width:300px;
  color: lightsalmon;
  background-color: #66818b;
  border:none;
  border-radius: 6px;
  outline: none;
  text-align: center;
  
}
.text-box:hover{
  box-shadow: 5px 5px 10px rgba(0,0,0,0.15);
}

.calc-button{
  border-radius: 4px;
  border:none;
  padding:8px;
  color:green;
  background-color:yellowgreen;
  cursor: pointer;
}

.calc-button:hover{
  box-shadow: 5px 5px 10px rgba(0,0,0,0.15);
}
.results{
  background-color: lightblue;
  padding:8px;
  color:blue;
  margin-bottom:0; 
  margin-top:0;
}
.farewell{
  text-align: center;
  padding: 20px;
  color:orangered;
  font-weight: bold;
}



  </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">

  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <div class=entry><label class="lable">Enter first number:</label>
    <input class="text-box" type="text" name="number1"><br><br>
    <label class="lable">Enter second number:</label>
    <input class="text-box" type="text" name="number2"><br><br>
    <input class="calc-button" type="submit" value="Calculate" name="calc"><br><br></div> 
  </form>
  <p class="results"> <?php
   if(isset($_POST['number1'])){
    $a=$_POST["number1"];
   }
   if(isset($_POST['number2'])){
    $b=$_POST["number2"];
   }
  if(empty($a) || empty($b)){
    echo "Enter the two numbers &#128528";
  }
  else{
      $sum=$a+$b;
      $sub=$a-$b;
      $mul=$a*$b;
      $div=$a/$b;
      echo "Sum = {$sum}<br>";
      echo "Difference = {$sub}<br>";
      echo "Product = {$mul}<br>";
      echo "Quoitent = {$div}<br>";
      echo '<div class="farewell">'."We're happy to Help!&#128515".'</div>';

  }
  // $a=null;
  // $b=null;

  // $a=$_POST["number1"];
  // $b=$_POST["number2"];
  // if($a==null || $b==null){
  //   echo "Enter the two numbers &#128528;";
 // }
  // else{
  // $sum=$a+$b;
  // $sub=$a-$b;
  // $mul=$a*$b;
  // $div=$a/$b;
  // echo "Sum = {$sum}<br>";
  // echo "Difference = {$sub}<br>";
  // echo "Product = {$mul}<br>";
  // echo "Quoitent = {$div}<br>";
  
  // echo '<div class="farewell">'."We're happy to Help!&#128515".'</div>';
  // }
  ?>
  
</p>

 

 </div>
</body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


