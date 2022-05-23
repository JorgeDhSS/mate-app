<?php

namespace App\Http\Controllers;

class TutorController extends Controller{

    public function __construct(){
        $this->middleware('auth.tutor')->except('');
    }

}