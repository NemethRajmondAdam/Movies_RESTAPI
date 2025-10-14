<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json(['movies'=>$movies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|min:2',
            'categories_id' =>'required|numeric',
            'description' =>'required|string|min:6',
            'pic_path' => 'nullable|string',
            'length' =>'required|string|min:2',
            'release_date'=>'required|string|min:4',
            'director_id'=>'required|numeric',
        ]);

        $movie = Movie::create($request->all());
        return response()->json(['movie'=>$movie]);
    }
}