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

  // $data equals an empty array 
  function loadView($name, $data = [] ){
   $viewPath = basePath("App/views/{$name}.view.php");

   // the inspect() from bottom which gives the var_dump() value
   // inspect($viewPath);

   if(file_exists($viewPath)){
      // extract transfrom controller/home associative array into a var
      extract($data);
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
   $partialPath =  basePath("App/views/partials/{$name}.php");

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

   /**
    * Format salary
    *
    * @param string $salary
    * @return string Formatted Salary
    */

    function formatSalary($salary) {
      // Remove any non-numeric characters except for dot and minus
      $numericSalary = preg_replace('/[^0-9.-]/', '', $salary);
  
      // Convert to float and format
      return '$' . number_format(floatval($numericSalary), 2);
  }

