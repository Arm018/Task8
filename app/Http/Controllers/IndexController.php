<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected IndexService $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }

    public function index()
    {
        $properties = $this->indexService->getProperties();
        $propertyTypes = Property::getTypeOptions();
        return view('home.welcome', compact('properties','propertyTypes'));
    }

    public function index2()
    {
        $properties = $this->indexService->getProperties();
        return view('home.welcome2', compact('properties'));
    }

    public function index3()
    {
        $properties = $this->indexService->getProperties();
        return view('home.welcome3', compact('properties'));
    }

    public function index4()
    {
        $properties = $this->indexService->getProperties();
        return view('home.welcome4', compact('properties'));
    }


}
