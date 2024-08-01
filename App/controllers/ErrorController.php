<?php
// autoLoader everything
namespace App\Controllers;

class ErrorController 
{ 
   /*
    * 404 not found Error
    * @return void
    */

    public static function notFound($message = 'Resource not found')
    {       
        http_response_code(404);
        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

    public static function unauthorized($message = 'You are not authorized')
    {       
        http_response_code(403);
        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}