# SpeedWork
## SpeedWeb is an easy and useful web framework for php.

# Installation
Download the project files and add them to the project directory.

# Get Start
1- Type "composer install" in the terminal.
2- Create "index.php" file.
3- Include autoload file in the page.
```php
require_once '/vendor/autoload.php';
```
4- Include the Route class.
```php
use SpeedWeb\core\Route;
```

# Create Page
1- Create a page using the Route class.
```php
//$method default 'get'
Route::run("/", "File@function", $method);
//Create the file with the first parameter inside the controllers folder. Example: File.php and create a function named second parameter into the file.

//Sample File.php
use SpeedWeb\core\Controller;

public function function(){
  Controller::view("File");  
}

//Finally, create the file with the name of your choice in the view folder. And use this file as frontend.
```
2- If you don't want to create a file, define the second parameter as a function.
```php
Route::run("/", function(){
  echo "Hello World"
});
```

# Helpers
Include in the page to use auxiliary functions. <a href="">Click here</a> to review function usages
```php
use SpeedWeb\helpers\ArrayHelper;
use SpeedWeb\helpers\DeviceHelper;
```
