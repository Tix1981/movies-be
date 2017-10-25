<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->query('name');

        if ($request) {
            return Movie::where('name', 'like', '%' . $name . '%')->get();
        } else {
            return Movie::all();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            Movie::Rules
        );

        $movie = new Movie();

        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('releaseDate');
        $movie->genres = $request->input('genres');

        $movie->save();

        return $movie;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            Movie::Rules
        );

        $movie = Movie::find($id);

        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('releaseDate');
        $movie->genres = $request->input('genres');

        $movie->save();

        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $movie->delete();

    }
}
