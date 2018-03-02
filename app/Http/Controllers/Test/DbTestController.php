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
            'content' => '111', //implode('+', $tables)
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

    public function selectRowsInDb()
    {
        $rows = DB::select('SELECT * FROM TestTable');
        $contents = [
            'content' => '',
            'rows' => $rows
        ];
        return view('test.db_test', $contents);
    }

    public function selectRowsWithConditionInDb()
    {
        // you can use question mark(?) to represent parameter bindings
        $rows = DB::select('SELECT * FROM TestTable WHERE TestColumn IN (?, ?)', ['RowOne', 'RowTwo1']);
        $contents = [
            'content' => '',
            'rows' => $rows
        ];
        return view('test.db_test', $contents);
    }

    public function selectOneRowWithConditionInDb()
    {
        // you can use the [Using Named Binding] to represent parameter bindings
        $row = DB::select('SELECT * FROM TestTable WHERE TestColumn = :TestColumn', ['TestColumn' => 'RowOne']);
        $contents = [
            'content' => '',
            'rows' => $row
        ];
        return view('test.db_test', $contents);
    }

    public function insertRowInDb()
    {
        $result = DB::insert('INSERT INTO TestTable(TestColumn) VALUES(?)', ['Row1']);
        
        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

}
