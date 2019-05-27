# Wifi Soil Measurer
Use a Raspberry Pi and WeMos D1 Mini (customisable) to read a Soil Moisture Measurer or other sensor results over WiFi.

A `HTML/PHP` script runs on the Raspberry Pi (you can also setup the web server on a standard PC) and a Python script parses the data recieved over this server, and outputs them (currently with `print` to console). 

The sensor measurer script runs on a ESP8266 or other WiFi-enabled Arduino-compatible board (I am using a WeMod D1 Mini) and reports the data over WiFi.

## Installation
To use this code, you will need to install standard web hosting software. The easiest way to do this is with [Apache](https://www.apache.org/). This is a cross-platform web server software.<br>
You can install Apache, or use a software called [XAMPP](https://www.apachefriends.org), which is a GUI for Apache to start and stop the server, making it easier to control. I recommend using XAMPP for Windows/Mac, and Apache for Linux/Raspberry Pi.

### Step 1: Install PHP
You also require PHP (Personal Home Page: Hypertext Preprocessor), which is a programming language used for web development. Here is how you can get it:<br>
Mac: Download off https://www.php.net/downloads.php or get it off Homebrew Package Manager.<br>
Windows: Download off https://windows.php.net/download. If you don't know which package, get the latest Non-Thread Safe package for your build (x64 or x86)<br>
Linux: Download off https://www.php.net/downloads.php or get it from your Linux Distro package manager (for Raspberry Pi the required packages are `php` and `php-mbstring`).<br>
Extract and/or install the package if you downloaded it. You can accept all the default options for the installer.


### Step 2: Install with Apache
To use with standard Apache Software, follow the instructions to install on your system: http://httpd.apache.org/download.cgi. You can also use packages in your Linux OS's package manager (for Raspberry Pi and Debian the package required is `apache2`). Extract and/or install package if you downloaded it.

### Step 2: Install with XAMPP
The XAMPP download site is https://www.apachefriends.org/download.html. Download the package for your OS, and install it (use default installer options).

### Step 3: Set up / Run with Apache
When using Apache, you need to find the Apache root location (this is normally /var/www/html/ for Linux). **IMPORTANT: Make sure the folder has write permissions.** In here, there should be a single file called `index.html`. Delete it, and copy your script in here (make sure it is named `index.php`!).<br>
It should then be ready to use. Go to `http://localhost` or `http://ip_address` and you should see the page titled **WiFi Soil Measurer**!

### Step 3: Set up / Run with XAMPP
When using XAMPP, go to the root install location (specified in the installer) and there should be lots of folders and files. Open the folder named `htdocs`, and you should see some folders and some files named `index.php` and `applications.html`. Delete the index.php, and copy your script into here (make sure it is named `index.php`!). Now open the XAMPP Control Panel (if it isn't already open go to the root folder, and run `xampp-control.exe` (for Windows)). Press the `Start` button next to `Apache`, and wait until it has started.<br>
It should then be ready to use. Go to `http://localhost` or `http://ip_address` and you should see the page titled **WiFi Soil Measurer**!

## Usage
To just see the main page, go to the `web_address_for_page`. On a local site, this is `http://localhost` or `http://ip_address`.<br>
For setting the sensor value, use: `web_address_for_page?result=n` <br>
where n is the result you want to send, and web_address_for_page is the ip address or `localhost`. This is what the ESP8266 board sends (using `GET`).<br>
Going to the main page `localhost` (or `ip_address`) or making a query, as shown above, shows you the current value of the sensor and a lot of other information about this project.
