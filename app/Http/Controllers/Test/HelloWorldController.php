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
        $contents = [
            'content' => 'Hello World !!!!! (Comes from test/hello_world blade template)'
        ];
        // you can set the folder name(likes A) in front of template name
        // then the controller will load the template in A folder in views folder  
        return view('test/hello_world', $contents);
    }
}
