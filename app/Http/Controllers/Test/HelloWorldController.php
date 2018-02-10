<?php
// if the controller is in one folder of Controllers folder
// you should make the folder name behind the Controllers' namespace
namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;


class HelloWorldController extends Controller
{
    /**
     * [say description] return the hello world string
     * 
     * @return [type] [description] string of Hello World
     */
    public function say()
    {
        return 'Hello World!!!(in Test folder)';
    }
}
