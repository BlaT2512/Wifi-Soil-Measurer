<!DOCTYPE html>
<html>
<head>
<style>
.slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */ 
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
}

.button:hover {
  background-color: green;
}
</style>
</head>
<body>
<h1>WiFi Soil Measurer</h1>
<p>What is this? This is a PHP script to allow you to write the value of a soil measurer (or any sensor) to a local file called value.txt by adding a ?value="" query to this web page.</p>
<p>You can then retrieve the value with a Python Script, for exmaple, by reading the file value.txt and doing what you want with it.</p>
<p>You use a device, e.g. an ESP8266 Arduino Board, to write the value by sending a GET request to this web page.</p>
<p>Here is the Github Page for this project: <a href="https://blat2512.github.io/Wifi-Soil-Measurer">https://blat2512.github.io/Wifi-Soil-Measurer</a></p>
<br>
<h2>The current sensor reading is:</h2>
<?php
if (!empty($_GET["value"])){
    // Display to the user the sensor value
    echo $_GET["value"];
    // Add a line break
    ?>
    <br>
    <br>
    <?php
    // Store the sensor value
    $fp = fopen('value.txt', 'w');
    fwrite($fp, $_GET["value"]);
    fclose($fp);
}
else{
    // Get the value from the local file, and display the value to the user
    echo file_get_contents("value.txt");
    // Add a line break
    ?>
    <br>
    <br>
    <?php
}
?>
<h2>Try it out!</h2>
<p>You can try this out by either adding a 'value' query to to the end of this link (e.g. enter 
<script>
if (location.href.includes("?value=")){
    var weblocation = location.href.split("?");
    document.write(weblocation[0] + "?value=27");
}
else{
    document.write(location.href + "?value=27");
}
</script>
 to set the sensor value to 27).</p>

<p>Or set the value with the slider below and press the 'Set Value' button:</p>

<div class="slidecontainer">
  <input type="range" min="0" max="100" value="50" class="slider" id="myRange">
</div>
<span style="font-weight:bold">Value:</span>
<span id="sliderval" style="font-weight:bold;color:red">50</span>
<br>
<br>
<button id="gobutton" class="button" onclick="setSensorValue()">Set Value</button>
<script>
function setSensorValue() {
  var button = document.getElementById("gobutton");
  var slider = document.getElementById("myRange");
  var locationtogo = '?value=' + slider.value;
  location.href=locationtogo;
}
</script>
<p>Pressing the 'Set Value' button above simply collects the value from the slider and adds this to the end of the url.</p>
<span>For example, pressing the 'Set Value' button right now will navigate you to</span>
<span id="sliderurl">50</span>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("sliderval");
var outputurl = document.getElementById("sliderurl");
output.innerHTML = slider.value; // Display the default slider value
if (location.href.includes("?value=")){
    var weblocation = location.href.split("?");
    outputurl.innerHTML = weblocation[0] + "?value=" + slider.value + ".";
}
else{
    outputurl.innerHTML = location.href + "?value=" + slider.value + ".";
}
// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
  if (location.href.includes("?value=")){
      var weblocation = location.href.split("?");
      outputurl.innerHTML = weblocation[0] + "?value=" + this.value + ".";
  }
  else{
      outputurl.innerHTML = location.href + "?value=" + this.value + ".";
  }
}
</script>
</body>
</html>