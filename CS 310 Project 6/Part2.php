<!DOCTYPE HTML>  
<html>
    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
    </head>
    <body>
        <?php
// define variables and set to empty values
$hourErr  = "";
$hour = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["hour"])) {
        $hourErr = "Hours are required";
    } else {
        $hour = test_input($_POST["hour"]);
        // check if hour only contains numbers
        if (!preg_match("/^[0-9.]*$/",$hour)) {
            $hourErr = "Only numbers, floats or integers";
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
        <h2>
            PHP Form Validation Example
        </h2>
        <p>
            <span class="error">* required field</span>
        </p>
        <form method="post" action="
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Hours: 
            <input type="text" name="hour" value="
<?php echo $hour;?>">
            <span class="error">* <?php echo $hourErr;?></span>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
if ($hour > 0) {
    if ($hour <= 3) {
        echo "$5";
    } else {
        $value = 5 + $hour * 1.5;
        if ($value < 18) {
            echo "$".$value;
        }
        else {
            echo "$18";
        }
    }
}
        ?>
    </body>
</html>