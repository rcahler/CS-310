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
$priceErr = $aprErr = $downErr = $yearErr = "";
$price = $apr = $down = $year = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["price"])) {
    $priceErr = "price is required";
  } else {
    $price = test_input($_POST["price"]);
    if (!preg_match("/^[0-9]*$/",$price)) {
      $priceErr = "Only integers allowed";
    }
  }
  
 if (empty($_POST["apr"])) {
    $aprErr = "A apr is required";
  } else {
    $apr = test_input($_POST["apr"]);
    if (!preg_match("/^[0-9.]*$/",$apr)) {
      $aprErr = "List a valid apr";
    }
  }
    
  if (empty($_POST["down"])) {
    $downErr = "down payment are required";
  } else {
    $down = test_input($_POST["down"]);
    if (!preg_match("/^[0-9]*$/",$down)) {
      $downErr = "Only integers allowed";
    }
  }
  
 if (empty($_POST["year"])) {
    $yearErr = "A year is required";
  } else {
    $year = test_input($_POST["year"]);
    if (!preg_match("/^[0-9]*$/",$year)) {
      $yearErr = "List a valid years";
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
  
  Price: <input type="text" name="price" value="<?php echo $price;?>">
  <span class="error">* <?php echo $priceErr;?></span>
  <br><br>
    
  APR: <input type="text" name="apr" value="<?php echo $apr;?>">
  <span class="error">* <?php echo $aprErr;?></span>
  <br><br>
    
  Down Payment: <input type="text" name="down" value="<?php echo $down;?>">
  <span class="error">* <?php echo $downErr;?></span>
  <br><br>
    
  Years: <input type="text" name="year" value="<?php echo $year;?>">
  <span class="error">* <?php echo $yearErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

/*
Using PHP and HTML 5, create a webpage that calculates the monthly payment for a car loan. The user enters the price of the car (P), down payment (D), Annual Percentage Rate (R), and the number of years (N). Compute the monthly payment (M) using the following formula and display it:

Let i = R / 1200 and n = N * 12;

M = ((P - D) * i * (1 + i)n) / ((1 + i)n - 1)
*/

$i = $apr/1200;
$n = $year * 12;

$M = (($price - $down) * $i * (1 + $i) * $n)/((1 + $i) * $n - 1);

echo $M;



?>

</body>
</html>