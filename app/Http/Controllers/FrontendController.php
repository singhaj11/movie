<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function landingPage()
    {
        if (auth()->check() && auth()->user()->role == 1) {
            return redirect()->route('dashboard');
        }
        $movie = new Movie();
        $movies = $movie->published()->latest()->paginate(5);
        // $populars = $movie->published()->with(['favourites' =>function($q){
        //     $q->orderBy('created_at', 'ASC');
        // }])->get();
        // dd($populars);
        return view('home', compact('movies'));
    }

    public function getFavourites(){
        if (auth()->check() && auth()->user()->role == 1) {
            return redirect()->route('dashboard');
        }
        $movie = new Movie();
        $movies = $movie->published()->whereHas('favourites', function($q){
            $q->where('user_id', auth()->user()->id);
        })->latest()->paginate(5);
        // $populars = $movie->published()->with(['favourites' =>function($q){
        //     $q->orderBy('created_at', 'ASC');
        // }])->get();
        // dd($populars);
        return view('favourites', compact('movies'));
    }
}
