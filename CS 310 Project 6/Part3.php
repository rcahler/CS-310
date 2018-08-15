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
$dayErr = $carErr  = "";
$day = $car  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["day"])) {
    $dayErr = "Hours are required";
  } else {
    $day = test_input($_POST["day"]);
    if (!preg_match("/^[0-9]*$/",$day)) {
      $hourErr = "Only integers allowed";
    }
  }
  
 if (empty($_POST["car"])) {
    $carErr = "A car is required";
  } else {
    $car = test_input($_POST["car"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$car)) {
      $carErr = "List a valid car";
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
  Days: <input type="text" name="day" value="<?php echo $day;?>">
  <span class="error">* <?php echo $dayErr;?></span>
  <br><br>
  Car: <input type="text" name="car" value="<?php echo $car;?>">
  <span class="error">* <?php echo $carErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

switch ($car) {
    case "Compact":
    case "compact":
        echo $day * 30 + 15;
        break;
    case "Intermediate":
    case "intermediate":
        echo $day * 40 + 15;
        break;
    case "Standard":
    case "standard":
        echo $day * 50 + 15;
        break;
    case " ":
        exit();
     default:
        echo "Please enter a valid type of car, either Compact, Intermediate, or Standard";
        exit();
    }

?>

</body>
</html>