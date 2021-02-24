<?php

require __DIR__ . '/vendor/autoload.php';

use SpeedWeb\core\Route;

//Simple homepage
Route::run("/", "Home@index");