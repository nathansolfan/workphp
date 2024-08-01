<?php

namespace Framework;

use App\Controllers\ErrorController;
use Error;

// // need to import $routes and set it to the $routes variable
// $routes = require basePath('routes.php');

// // check if URI is in the array, with array_key_exists and the 2 params: key/array

// if(array_key_exists($uri, $routes)){
//     require(basePath($routes[$uri]));
// } else {
//     http_response_code(404);
//     require(basePath($routes['404']));
// }


class Router {
    protected $routes = [];

    /**
     * Add a new Route
     * 
     * @param $method
     * @param [type] $uri
     * @param [type] $action
     * @return void
     */
    public function registerRoute($method, $uri, $action){

        list($controller, $controllerMethod) = explode('@', $action);
        // inspectAndDie($controller);
        // $this access the empty array routes
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            // not passing $controller
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
        ];
    }

    /**
     * Add a GET route
     * 
     * @param string $uri
     * @param string $controller
     * @return void 
     */
    public function get($uri, $controller){
        // func registerRoute will pass the data, and pass the 3 params
        $this->registerRoute('GET', $uri, $controller);         
    }

    /**
     * Add a POST route
     * 
     * @param string $uri
     * @param string $controller
     * @return void 
     */
    public function post($uri, $controller){
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT route
     * 
     * @param string $uri er
     * @return void 
     */
    public function put($uri, $controller){
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE route
     * 
     * @param string $uri
     * @param string $controller
     * @return void 
     */
    public function delete($uri, $controller){
        $this->registerRoute('DELETE', $uri, $controller);
    }

    // public function error($httpCode = 404){
    //     http_response_code($httpCode);
    //     loadView("error/{$httpCode}");
    //     exit;
    // }

    /**
     * Route the request
     * 
     * @param string $uri
     * @param string $method
     * @return void 
     * 
     *  $_SERVER['REQUEST_URI']
     *  $_SERVER['REQUEST_METHOD']
     */

    //  if matches the route then loads the correct controller
    // on routes.php check $router->get('/', 'controllers/home.php') or others
   
    // custom autoloader
    public function route($uri, $method){
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                // require basePath('App/' . $route['controller']);
                // Extract Controller and ControllerMethod from routes from RegisterROute
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                // Instantiate controller, call the method
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();


                return;            
            }            
        }
        // :: static
        ErrorController::notFound();           
    }
}