<!DOCTYPE html>
<html>
<head>

</head>

<body>

<h1>Wifi-SM PHP Test</h1>

<?php
$get_value=$_GET["value"];
if (!empty($get_value)){
    // Display to the user the sensor value
    echo $get_value;
}
else{

}
?>
</body>
</html>