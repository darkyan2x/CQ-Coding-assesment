<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = 'Welcome to our website';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'Welcome to our website';
        return view('pages.about')->with('title', $title);
    }
    
    public function services(){
        $data =  [
            'title' => 'Welcome to services',
            'services' => ['Web Design', 'programming','SEO']
        ];
        return view('pages.services')->with($data);
    }
}
