<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;

class WebsiteController extends Controller
{
    public function home(){

        $locations = Location::with('media','properties')
        ->where(['featured' => '1'])
        ->limit(6)
        ->get()
        ->append('listings');

        $properties = Property::with('media','location','location.currency')
        ->where(['featured' => '1'])
        ->limit(6)
        ->get();

        return view('welcome', compact('locations','properties'));
    }
}
