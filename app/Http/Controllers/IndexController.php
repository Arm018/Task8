<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $properties = Property::query()->with('user')->with('details')->with('images')->orderByDesc('created_at')->take(5)->get();
        return view('home.welcome', compact('properties'));
    }

    public function index2()
    {
        $properties = Property::query()->with('user')->with('details')->with('images')->orderByDesc('created_at')->take(5)->get();
        return view('home.welcome2', compact('properties'));
    }

    public function index3()
    {
        $properties = Property::query()->with('user')->with('details')->with('images')->orderByDesc('created_at')->take(5)->get();
        return view('home.welcome3', compact('properties'));
    }
    public function index4()
    {
        $properties = Property::query()->with('user')->with('details')->with('images')->orderByDesc('created_at')->take(5)->get();
        return view('home.welcome4', compact('properties'));
    }

}
