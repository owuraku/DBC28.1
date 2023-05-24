<?php

namespace App\Http\Controllers;

class FirstController extends Controller {

    public function myFirstControllerFunction(){
        return "You have invoked this first function";
    }

    public function mySecondControllerFunction($id){
         return "Get employee with id of $id";
    }

}
