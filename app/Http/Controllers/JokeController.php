<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors =  DB::table('authors')->get();
        $jokeCategories = DB::table('joke_categories')->get();
        $categories = DB::table('categories')->get();
        $jokes = Joke::orderBy('id', 'desc')->paginate(100);
        return view('jokes.index', compact('jokes', 'authors', 'jokeCategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors =  DB::table('authors')->get();
        return view('jokes.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'joketext' => 'required',
            'jokedate' => 'required',
            'authorid' => 'required',
        ]);

        Joke::create($request->post());

        return redirect()->route('jokes.index')->with('success', 'Joke has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function show(Joke $joke)
    {
        return view('jokes.show', compact('joke'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function edit(Joke $joke)
    {
        $authors =  DB::table('authors')->get();
        return view('jokes.edit', compact('joke', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joke $joke)
    {
        $request->validate([
            'joketext' => 'required',
            'jokedate' => 'required',
            'authorid' => 'required',
        ]);

        $joke->fill($request->post())->save();

        return redirect()->route('jokes.index')->with('success', 'Joke Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joke $joke)
    {
        $joke->delete();
        return redirect()->route('jokes.index')->with('success', 'Joke has been deleted successfully');
    }
}
