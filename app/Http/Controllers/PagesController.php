<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller

{

    // User must be authenticated for this controller to work
    public function __construct() {
        $this->middleware('auth');
    }    
    

    public function home() {
        return view('pages.home');
    }

    public function faq() {
        return view('pages.faq');
    }

    public function tutorial() {
        return view('pages.tutorial');
    }
}
