<?php
	session_start();
?>


<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$quantityErr = $itemErr = "";
$item = "";
$quantity = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["item"])) {
    $itemErr = "items are required";
  } else {
    $item = test_input($_POST["item"]);
  }
  
  if (empty($_POST["quantity"])) {
    $quantityErr = "quantity is required";
  } else {
    $quantity = test_input($_POST["quantity"]);
    if (!preg_match("/^[0-9]*$/",$quantity)) {
      $quantityErr = "Only integers allowed";
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

  Items: <select name="item">
    <option value = "LN">LEAN IN ($ 19.99)</option>
	<option value = "HHH">HAPPY, HAPPY, HAPPY ($ 15.99)</option>
	<option value = "ER">ELEVEN RINGS ($ 17.99)</option>
	<option value = "LEDWO">LET'S EXPLORE DIABETES WITH OWLS ($ 12.99)</option>
	<option value = "TGALL">THE GUNS AT LAST LIGHT ($ 16.99)</option>
  </select>
  <span class="error">*</span>
  <br><br>
  
  quantity: <input type="text" name="quantity" value="<?php echo $quantity;?>">
  <span class="error">* <?php echo $quantityErr;?></span>
  <br><br>
  
  <button type="submit" name='submit' value="Submit">Add to Cart</button>
  <br><br>
  <button type="submit" name='cart' value="cart" >Empty Cart</button> 
  <br><br>
  <button type="submit" name='check' value="check" >Check-out</button>
  <br><br>
  
</form>

<?php
	if(isset($_POST['cart'])){
		if($_POST['cart']== "cart") {
			
			//Resets cart
			$_SESSION["LN_count"] = 0;
			$_SESSION["HHH_count"] = 0;
			$_SESSION["ER_count"] = 0;
			$_SESSION["LEDWO_count"] = 0;
			$_SESSION["TGALL_count"] = 0;
		}
	}
	
	if(isset($_POST['check'])){
		if($_POST['check']== "check") {
			
			$total = ($_SESSION["LN_count"] *19.99) + ($_SESSION["HHH_count"] * 15.99) + ($_SESSION["ER_count"] * 17.99) + ($_SESSION["LEDWO_count"] *12.99) + ($_SESSION["TGALL_count"] * 16.99);
			echo "Your total is $".$total."<br>"."<br>";
		}
	}
	
	if (!isset($_SESSION["LN_count"])){
		$_SESSION["LN_count"] = 0;
	}
	if (!isset($_SESSION["HHH_count"])){
		$_SESSION["HHH_count"] = 0;
	}
	if (!isset($_SESSION["ER_count"])){
		$_SESSION["ER_count"] = 0;
	}
	if (!isset($_SESSION["LEDWO_count"])){
		$_SESSION["LEDWO_count"] = 0;
	}
	if (!isset($_SESSION["TGALL_count"])){
		$_SESSION["TGALL_count"] = 0;
	}
	
	if(isset($_POST['submit'])) {
		if($_POST['submit'] == "Submit") {
			if ($quantity > 0) {
				switch ($item) {
					case "LN":
						$_SESSION["LN_count"] = $_SESSION["LN_count"] + $quantity;
						break;
					case "HHH":
						$_SESSION["HHH_count"] = $_SESSION["HHH_count"] + $quantity;
						break;
					case "ER":
						$_SESSION["ER_count"] = $_SESSION["ER_count"] + $quantity;
						break;
					case "LEDWO":
						$_SESSION["LEDWO_count"] = $_SESSION["LEDWO_count"] + $quantity;
						break;
					case "TGALL":
						$_SESSION["TGALL_count"] = $_SESSION["TGALL_count"] + $quantity;
						break;
				}
			}
		}
	}
	echo "Cart contains ".$_SESSION["LN_count"]." LEAN IN at $19.99"."<br>";
	echo "Cart contains ".$_SESSION["HHH_count"]." HAPPY, HAPPY, HAPPY at $15.99"."<br>";
	echo "Cart contains ".$_SESSION["ER_count"]." ELEVEN RINGS at $17.99"."<br>";
	echo "Cart contains ".$_SESSION["LEDWO_count"]." LET'S EXPLORE DIABETES WITH OWLS at $12.99"."<br>";
	echo "Cart contains ".$_SESSION["TGALL_count"]." THE GUNS AT LAST LIGHT $16.99"."<br>";

?>

</body>
</html>