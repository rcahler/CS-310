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
$hourErr = $positionErr  = "";
$hour = $position  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["hour"])) {
    $hourErr = "Hours are required";
  } else {
    $hour = test_input($_POST["hour"]);
    // check if hour only contains numbers
    if (!preg_match("/^[0-9 ]*$/",$hour)) {
      $hourErr = "Only letters and white space allowed";
    }
  }
  
 if (empty($_POST["position"])) {
    $positionErr = "A position is required";
  } else {
    $position = test_input($_POST["position"]);
    // check if position is valid
    if (!preg_match("/^[a-zA-Z ]*$/",$position)) {
      $positionErr = "List a valid position";
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
  Hours: <input type="text" name="hour" value="<?php echo $hour;?>">
  <span class="error">* <?php echo $hourErr;?></span>
  <br><br>
  Position: <input type="text" name="position" value="<?php echo $position;?>">
  <span class="error">* <?php echo $positionErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
switch ($position) {
    case "Tester":
    case "tester":
        echo $hour * 35;
        break;
    case "Developer":
    case "developer":
        echo $hour * 50;
        break;
    case "Manager":
    case "manager":
        echo $hour * 65;
        break;
    case " ":
        exit();
     default:
        echo "Please enter a valid position, either Tester, Developer, or Manager";
        exit();
    }
?>

</body>
</html>