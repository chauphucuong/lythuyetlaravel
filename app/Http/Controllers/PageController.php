<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;
class PageController extends Controller
{
    public function showInfo(){
        return view('thongtin');
    }

    public function testAction(){
        echo "Đây là một action trong class PageController";
        return redirect()->route('hcm');
    }

}
