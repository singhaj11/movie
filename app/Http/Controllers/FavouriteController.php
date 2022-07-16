<?php

namespace App\Http\Controllers;

use App\Mail\AddedToFavourite;
use App\Models\Favourite;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FavouriteController extends Controller
{
    public function __construct(Favourite $favorite, Movie $movie)
    {
        $this->model = $favorite;
        $this->movie = $movie;
    }

    public function store(Request $request)
    {
        $movie = $this->movie->find($request->id);
        $user = User::where('id', auth()->user()->id)->first();
        $favourite = $this->model;
        $favourite->user_id = $user->id;
        $liked = $this->model->where('favouriteable_id', $request->id)->where('user_id', $user->id)->first();
        if ($liked) {
            return redirect()->back()->withErrors(['alert-success' => 'Already Added to favorite.']);
        }
        $user = User::where('id', auth()->user()->id)->first();
        $movie->favourites()->save($favourite);
        Mail::to($user->email)->send(new AddedToFavourite($user, $movie));
        return redirect()->back()->withErrors(['alert-success' => 'Added to favorite successfully']);
    }

    public function destroy(Request $request)
    {
        try {
            $liked = $this->model->where('favouriteable_id', $request->id)->where('user_id', auth()->user()->id)->first();
            if ($liked) {
                $liked->delete();
                return redirect()->back()->withErrors(['alert-success' => 'Removed From to favorite successfully']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => 'Something went wrong']);
        }
    }
}
