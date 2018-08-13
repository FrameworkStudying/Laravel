<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // You could customize the relationship with the db table
    //protected $table = 'cust_Contacts';
    
    // You could customize the the record id in database
    protected $primaryKey = 'r_id';
    
    // You could specify another connection of DB for the model
    // By default, all Eloquent models will use the default database connection
    //protected $connection = 'new_conn';
    
    // Eloquent expects created_at and updated_at columns exist in tables.
    // The two columns will not be automatically managed by Eloquent if you set $timestamps property to false.
    // public $timestamps = false;
    
    // You could customize the names of the columns used to store the timestamps
    // const CREATED_AT = 'cust_created_at';
    // const UPDATED_AT = 'cust_updated_at';
    

}
