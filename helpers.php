<?php

/**
 * Get Base Path
 * 
 * @param string $path
 * @return string
 */

 function basePath($path = ''){
    return __DIR__ . '/' . $path; 
 }

 /**
  * Load View
  * 
  * @param string $name
  * @return void
  */

  function loadView($name){
   require basePath("views/{$name}.view.php");
  }

  /**
  * Load Partials
  * 
  * @param string $name
  * @return void
  */

  function loadPartial($name){
   require basePath("views/partials/{$name}.php");
  }