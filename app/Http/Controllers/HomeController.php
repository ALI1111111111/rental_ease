<?php

namespace App\Http\Controllers;
use App\Models\Property;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = Property::all(); // Assume you have a Property model
        return view('home', compact('properties'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $properties = Property::where('title', 'like', "%$query%")->get();
        return view('home', compact('properties'));
    }
}
