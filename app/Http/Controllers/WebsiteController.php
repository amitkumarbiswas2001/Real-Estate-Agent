<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class WebsiteController extends Controller
{
    public function home(){
        $properties = Property::where(['featured' => '1'])
        ->limit(6)
        ->get();


        return view('welcome', compact('properties'));
    }
}
