<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public $imageDir = "/uploads/movies";

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->model->query();
        if (isset($request->keyword) && $request->keyword != null) {
            $query->whereRaw(" LOWER(CONCAT_WS(' ', title)) LIKE LOWER('%" . (trim($request->keyword)) . "%')");
        }
        $items = $query->with('favourites')->latest()->paginate()->withQueryString();
        return view('admin.movie.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        try {
            $data['slug'] = $data['title'];
            if ($request->hasFile('poster')) {
                $data['image'] = uploadImage($this->imageDir, 'poster');
            }
            $this->model->create($data);
            return redirect()->route('movies.index')->withErrors(['alert-success' => 'Movie Saved Successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('movies.index')->withErrors(['alert-danger' => "Something Went Wrong While Saving Movie."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->model->find($id);
        return view('admin.movie.create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        $data = $request->all();
        try {
            $movie = $this->model->findOrFail($id);
            $oldImage = $movie->image;
            if ($request->hasFile('poster')) {
                $data['image'] = uploadImage($this->imageDir, 'poster');
                if ($oldImage) {
                    removeImage('/uploads/movies', $oldImage);
                }
            }
            $movie->update($data);
            return redirect()->route('movies.index')->withErrors(['alert-success' => 'Movie Updated Successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('movies.index')->withErrors(['alert-danger' => "Something Went Wrong While Updating Movie."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $movie = $this->model->findOrFail($id);
            $movie->delete();
            return redirect()->route('movies.index')->withErrors(['alert-success' => 'Movie Deleted Successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('movies.index')->withErrors(['alert-danger' => "Something Went Wrong While Deleting Movie."]);
        }
    }
}
