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
$heightErr = "";
$gender = "";
$height = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gender"])) {
    $genderErr = "genders are required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if (empty($_POST["height"])) {
    $heightErr = "Height is required";
  } else {
    $height = test_input($_POST["height"]);
    if (!preg_match("/^[0-9]*$/",$height)) {
      $heightErr = "Only integers allowed";
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
  <!--
  genders: <input type="text" name="gender" value="<?php //echo $gender;?>">
  <span class="error">* <?php //echo $genderErr;?></span>
  <br><br>
  -->
  Gender: <select name="gender">
    <option value = "M">M</option>
	<option value = "F">F</option>
  </select>
  <span class="error">*</span>
  <br><br>
  Height in inches: <input type="text" name="height" value="<?php echo $height;?>">
  <span class="error">* <?php echo $heightErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if (strcmp($gender,"M") == 0) {
	if ($height > 0) {
		$weight = ($height * 4) - 128;
		$string = "Ideal weight is ";
		echo $string.$weight."lbs";
	}
} else if (strcmp($gender,"F") == 0) {
	if ($height > 0) {
		$weight = ($height * 3.5) - 108;
		$string = "Ideal weight is ";
		echo $string.$weight."lbs";
	}
}

?>

</body>
</html>