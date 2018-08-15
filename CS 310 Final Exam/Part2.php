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
$ageErr = $hrErr = "";
$age = $hr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    if (!preg_match("/^[0-9]*$/",$age)) {
      $ageErr = "Only integers allowed";
    }
  }
  
  if (empty($_POST["hr"])) {
    $hrErr = "Heart rate is required";
  } else {
    $hr = test_input($_POST["hr"]);
    if (!preg_match("/^[0-9]*$/",$hr)) {
      $hrErr = "Only integers allowed";
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
  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  
  Resting heart rate: <input type="text" name="hr" value="<?php echo $hr;?>">
  <span class="error">* <?php echo $hrErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
	if (($age > 0)&&($hr > 0)) {
		$max = 220 - $age;
		$thr = (($max - $hr) * 0.6) + $hr;
		echo "THR is ".$thr." beats per minute";
	}

?>

</body>
</html>