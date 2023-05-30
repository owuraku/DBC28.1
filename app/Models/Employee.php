<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;


    // protected $guarded = [];
    protected $fillable = ['email', 'firstname', 'lastname', 'dob', 'gender', 'position', 'image', 'marital_status', 'department_id'];
    // create read update delete -> CRUD
    //create
    // save()/ create()
    //read
    // all() : select * from table;
    // where() : to refine our search
    //update
    // update()/save()

    //delete
    // delete()

    public function fullname()
    {
       return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

     public function getImageURL()
    {
       return asset($this->image);
    }

    public function department(){
      return $this->belongsTo(Department::class, 'department_id');
    }
}
