<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Joke;
use App\Models\JokeCategories;
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
        $jokeCategories = DB::table('joke_categories')->get();
        $categories = DB::table('categories')->get();
        return view('jokes.create', compact('authors', 'jokeCategories', 'categories'));
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
            'categoryid' => 'required'
        ]);

        Joke::create([
            'joketext' => $request->joketext,
            'jokedate' => $request->jokedate,
            'authorid' => $request->authorid
        ]);

        $joke = DB::table('jokes')->latest('created_at')->first();


        foreach ($request->categoryid as $cat => $id) {
            $data[]  = [
                'jokeid' => $joke->id,
                'categoryid' => $id
            ];
        }

        JokeCategories::insert($data);


        return redirect()->route('jokes.index')->with('success', 'Joke has been created successfully.');
    }



    public function show(Joke $joke)
    {
        $categories =  DB::table('categories')
            ->join('joke_categories', 'joke_categories.categoryid', '=', 'categories.id')
            ->where('joke_categories.jokeid', intval($joke->id))
            ->get();
        return view('categories.filter', compact('joke'))->with("categories", $categories);
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
        $categories = DB::table('categories')->get();
        $jokeCategories = DB::table('joke_categories')->where('jokeid', $joke->id)->get();
        return view('jokes.edit', compact('joke', 'authors', 'jokeCategories', 'categories', 'jokeCategories'));
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
            'categoryid' => 'required'
        ]);

        $joke->fill([
            'joketext' => $request->joketext,
            'jokedate' => $request->jokedate,
            'authorid' => $request->authorid
        ])->save();

        /* se eliminen les entraes de joke category que tenia la joke*/
        DB::table('joke_categories')->where('jokeid', $joke->id)->delete();
        /* se añadixen les noves*/
        $data = [];

        foreach ($request->categoryid as $cat => $id) {
            $data[]  = [
                'jokeid' => $joke->id,
                'categoryid' => $id
            ];
        }

        JokeCategories::insert($data);

        /*$jokeCat->fill([
            'jokeid' => $joke->id,
            'categoryid' => $request->categoryid,
        ])->save();*/

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
