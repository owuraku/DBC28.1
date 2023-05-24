<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'dob', 'gender', 'position', 'marital_status', 'middlename', 'email', 'image'
    ];
    // create read update delete -> CRUD
    // protected $table = 'employeeeeees';

    //create
    // save()/ create()
    //read
    // all() : select * from table;
    // where() : to refine our search
    //update
    // update()/save()

    //delete
    // delete()
}
