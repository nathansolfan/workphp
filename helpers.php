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
   $viewPath = basePath("views/{$name}.view.php");

   // the inspect() from bottom which gives the var_dump() value
   inspect($viewPath);

   if(file_exists($viewPath)){
      require $viewPath;
   } else {
      echo "View '{$name}' not found";
   }
  }


  /**
  * Load Partials
  * 
  * @param string $name
  * @return void
  */

  function loadPartial($name){
   $partialPath =  basePath("views/partials/{$name}.php");

   if(file_exists($partialPath)){
      require $partialPath;
   } else {
      echo "View '{$name}' not found";
   }
  }

  /**
   * Inspect value(s)
   * 
   * @param mixed $value
   * @return void - empty
   */

   function inspect($value){
      echo '<pre>';
      var_dump($value);
      echo '<pre>';
   }

   /**
   * Inspect value(s) and DIE
   * 
   * @param mixed $value
   * @return void - empty
   */

   function inspectAndDie($value){
      echo '<pre>';
      die(var_dump($value));
      echo '<pre>';
   }

