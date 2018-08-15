<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$priceErr = $aprErr = $downErr = $yearErr = $finalErr= "";
$apr = $down = $year = $final = 0;
$price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  if (empty($_POST["price"])) {
    $priceErr = "A name is required";
  } else {
    $price = test_input($_POST["price"]);
    if (!preg_match("/^[a-zA-Z]*$/",$price)) {
      $priceErr = "Only alphabetic charachters allowed";
    }
  }
  
 if (empty($_POST["apr"])) {
    $aprErr = "A score is required";
  } else {
    $apr = test_input($_POST["apr"]);
    if (!preg_match("/^[0-9.]*$/",$apr)) {
      $aprErr = "List a valid score";
    }
  }
    
  if (empty($_POST["down"])) {
    $downErr = "A score is required";
  } else {
    $down = test_input($_POST["down"]);
    if (!preg_match("/^[0-9]*$/",$down)) {
      $downErr = "List a valid score";
    }
  }
  
 if (empty($_POST["year"])) {
    $yearErr = "A score is required";
  } else {
    $year = test_input($_POST["year"]);
    if (!preg_match("/^[0-9]*$/",$year)) {
      $yearErr = "List a valid score";
    }
  }
     
 if (empty($_POST["final"])) {
    $finalErr = "A score is required";
  } else {
    $final = test_input($_POST["final"]);
    if (!preg_match("/^[0-9]*$/",$final)) {
      $finalErr = "List a valid score";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  Name: <input type="text" name="price" value="<?php echo $price;?>">
  <span class="error">* <?php echo $priceErr;?></span>
  <br><br>
    
  Total Quiz Score: <input type="text" name="apr" value="<?php echo $apr;?>">
  <span class="error">* <?php echo $aprErr;?></span>
  <br><br>
    
  Total Assignment Score: <input type="text" name="down" value="<?php echo $down;?>">
  <span class="error">* <?php echo $downErr;?></span>
  <br><br>
    
  Midterm Exam Score: <input type="text" name="year" value="<?php echo $year;?>">
  <span class="error">* <?php echo $yearErr;?></span>
  <br><br>
    
  Final Exam Score: <input type="text" name="year" value="<?php echo $year;?>">
  <span class="error">* <?php echo $yearErr;?></span>
  <br><br>
    
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

/*
Using PHP and HTML5, design and build a webpage that calculates letter grades for students. The user enters the student’s name, total quiz score (q), total assignment score (a), midterm exam score (m), and final exam score (f). Your PHP script should read all the input, calculate the average score, compute the letter grade and display the average score and the letter grade.

average score = (q * 15%) + (a * 40%) + (m * 20%) + (f * 25%)

Use a straight grading scale for assigning letter grades.
*/

$q = $apr;
$a = $down;
$m = $year;
$f = $final;

echo $price;
echo "\n";
echo ($q * 0.15) + ($a * 0.4) + ($m * 0.2) + ($f * 0.25) 

?>

</body>
</html>