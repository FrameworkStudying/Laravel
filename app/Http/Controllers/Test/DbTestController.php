<?php
namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

// you should import the DB package when you want to use DB class
use Illuminate\Support\Facades\DB;

class DbTestController extends Controller
{
	/**
	 * [__invoke test the db connect]
	 * @return [type] [description]
	 */
    public function __invoke()
    {
    	$tables = DB::select('SHOW TABLES');
    	var_dump($tables);
    	$contents = [
    		// convert array to string
            'content' => '111' //implode('+', $tables)
        ];
        return view('test.db_test', $contents);
    }
}
