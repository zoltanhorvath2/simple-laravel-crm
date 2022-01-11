<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function getMainPage(){
        return view('main-page.main-page');
    }
}
