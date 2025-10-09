<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
     return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
    }

    public function resume(){
        return view('frontend.resume');
    }

    public function services(){
        return view('frontend.services');
    }

    public function serviceDetails(){
        return view('frontend.service-details');
    }

    public function portfolioDetails(){
        return view('frontend.portfolio-details');
    }

     public function contact(){
        return view('frontend.contact');
    }
}
