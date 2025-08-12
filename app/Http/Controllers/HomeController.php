<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $viewData = [
            "title" => "About us - Online Store",
            "subtitle" => "About us",
            "description" => "This is an about page ...",
            "author" => "Developed by: Jose Duque"
        ];
        
        return view('home.about')->with("viewData", $viewData);
    }

    public function contact(): View
    {
        $viewData = [
            "title" => "Contact - Online Store",
            "subtitle" => "Contact Information",
            "data1" => "Jose Duque",
            "data2" => "jaduquep69@eafit.edu.co",
            "data3" => "Sabaneta, Colombia",
            "data4" => "311 800 0000",
            "description" => "This is an contact page ...",
            "author" => "Developed by: Jose Duque"
        ];
        
        return view('home.contact')->with("viewData", $viewData);
    }
}