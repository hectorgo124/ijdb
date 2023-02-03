<?php

namespace App\Http\Controllers;

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
        $jokes = Joke::orderBy('id', 'desc')->paginate(5);
        return view('jokes.index', compact('jokes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jokes.create');
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
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
        return view('jokes.edit', compact('joke'));
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
