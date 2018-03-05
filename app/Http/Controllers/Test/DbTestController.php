<?php
namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

// you should import the DB package when you want to use DB class
use Illuminate\Support\Facades\DB;
// you should import the Redis package when you want to use Redis class
use Illuminate\Support\Facades\Redis;

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

    public function queryTransactionClosureInDb()
    {
        $result = 0;
        // the sql in closure will be processed as a transaction
        DB::transaction(function() {
            $result = DB::insert('INSERT INTO TestTable(TestColumn) VALUES(?)', ['Row2']);
            // because of there is an unique index on TestColumn column and the Row1 record is exist
            // so that there is a SQL processing error when insert Row1 into TestTable
            // And the rollback function will be called and Row2 will not be store in DB
            $result = DB::insert('INSERT INTO TestTable(TestColumn) VALUES(?)', ['Row1']);
        });

        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

    public function queryTransactionInDb()
    {
        $result = 0;
        // start the transaction
        DB::beginTransaction();
        $row = DB::select('SELECT * FROM TestTable WHERE TestColumn = :TestColumn', ['TestColumn' => 'Row3'], true);
        if (empty($row)) {
            $result = DB::insert('INSERT INTO TestTable(TestColumn) VALUES(?)', ['Row3']);
        }

        if ($result) {
            // finish the transaction
            // the record will not be stored in DB without commit function is called
            DB::commit();
        } else {
            // roll back the transaction
            // the result of edit record processing in DB will not be stored when rollback is called
            DB::rollBack();
        }

        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

    public function queryGetInRedis()
    {
        $userName = 'core';
        $result = Redis::get('user-name-'.$userName);
        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

    public function setInRedis()
    {
        $userName = 'core';
        // if the porcess is run completely, then the response will be 1
        $result = Redis::set('user-name-'.$userName, 'Xiang Hou');
        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }

    public function updateIndexListInRedis()
    {
        $listName = "name-list";
        // if the porcess is run completely, then the response will be 1
        $result = Redis::lset($listName, 0, 'BuBu');
        $contents = [
            'content' => $result,
            'rows' => array()
        ];
        return view('test.db_test', $contents);
    }
}
