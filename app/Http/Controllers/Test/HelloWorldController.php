<?php
// if the controller is in one folder of Controllers folder
// you should make the folder name behind the Controllers' namespace
namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

// if you want to use App Class, then you should include App
use App;

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

    public function sayAndCheckEn()
    {
        // you can use this way to change local language setting
        App::setLocale('en');
        $contents = [
            'content' => 'Hello World !!!!! (check test/hello_world whether the template exists)'
        ];
        
        // the check template function is a method of Illuminate\Support\Facades\View
        // you could include Illuminate\Support\Facades\View for calling function when you want to use View::exists function
        if (View::exists('test/hello_world1')) {
            // if you want to make controller loading template in a deeper folder(likes A) in views folder
            // also you can connect template name after A folder name by a dot likes below 
            return view('test.hello_world', $contents);
        } elseif (View::exists('test.hello_world')) {
            return view('test.hello_world', $contents);
        } else {
            return 'test/hello_world template is not exist';
        }
    }

    public function sayAndCheckZh()
    {
        $contents = [
            'content' => 'Hello World !!!!! (check test/hello_world whether the template exists)'
        ];
        
        // the check template function is a method of Illuminate\Support\Facades\View
        // you could include Illuminate\Support\Facades\View for calling function when you want to use View::exists function
        if (View::exists('test/hello_world1')) {
            // if you want to make controller loading template in a deeper folder(likes A) in views folder
            // also you can connect template name after A folder name by a dot likes below 
            return view('test.hello_world1', $contents);
        } elseif (View::exists('test.hello_world')) {
            return view('test.hello_world', $contents);
        } else {
            return 'test/hello_world template is not exist';
        }
    }

    public function sayWithFirst()
    {
        $contents = [
            'content' => 'Hello World !!!!! (check test/hello_world whether the template exists)'
        ];
        // you can use the function to set a list of template options,
        // it will check the templates whether each template exists from index 0 to index n
        // the smaller index is found to exist, then controller will load the template as first choice 
        // you could include Illuminate\Support\Facades\View for calling function when you want to use View::first
        return View::first(
            ['test.hello_world1', 'hello_world1', 'hello_world'],
            $contents
        );
    }
}
