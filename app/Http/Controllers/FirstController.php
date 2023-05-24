<?php

namespace App\Http\Controllers;

class FirstController extends Controller {

    public function myFirstControllerFunction(){
        return "You have invoked this first function";
    }

    public function mySecondControllerFunction($id){
        return "You have invoked this second function. Get employee with id of $id";
    }

}
