# Wifi Soil Measurer
Use a Raspberry Pi and WeMos D1 Mini (customisable) to read a Soil Moisture Measurer or other sensor results over WiFi.

A `HTML/PHP` script runs on the Raspberry Pi (you could also setup the web server on a standard PC) and a Python script parses the data recieved over this server, and outputs them (currently with `print` to console). 

The sensor measurer script runs on a ESP8266 or other WiFi-enabled Arduino-compatible board (I am using a WeMod D1 Mini) and reports the data over WiFi.

## Installation
The code is currently not done/implemented yet

## Usage
If hosting on local web server: <br>
`localhost/index.php?result=n` or <br>
`ip_address/index.php?result=n`<br>
where n is the result you want to send. This is what the ESP8266 board sends (using `POST`)<br>
Going to `localhost/index.php` (or `ip_address/index.php`) or making a query, as shown above, shows you the current value of the sensor.

## Testing
This website allows you to test the code without installing anything. [Click here](https://www.google.com.au) to see the current value of the 'sensor'. To the end of the url of that page, add `?result=n`, with n as a number, to set the 'sensor' value!
