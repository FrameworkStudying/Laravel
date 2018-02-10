<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// if the controller does not extend the base controller
// then, such as middleware, validate and so on can not be use in the controller
// Also, the controller is not  required to extend a base controller class 
class HelloWorldController extends Controller
{
    /**
     * [say description] return the hello world string
     * 
     * @return [type] [description] string of Hello World
     */
    public function say()
    {
        return 'Hello World!!!';
    }
}