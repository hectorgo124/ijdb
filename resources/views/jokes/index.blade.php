<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jokes List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@include('navbar')

<body class="bg-secondary text-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Jokes List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('jokes.create') }}"> Create Joke</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th>Joke Text</th>
                    <th>Joke Date</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jokes as $joke)
                    <tr>
                        <td>{{ $joke->joketext }}</td>
                        <td>{{ $joke->jokedate }}</td>
                        <td>
                            @foreach ($authors as $author)
                                @if ($author->id == $joke->authorid)
                                    {{ $author->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($jokeCategories as $jokeCat)
                                @if ($jokeCat->jokeid == $joke->id)
                                    @foreach ($categories as $category)
                                        @if ($category->id == $jokeCat->categoryid)
                                            > {{ $category->name }} <br>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('jokes.destroy', $joke->id) }}" method="Post">
                                @method('EDIT')
                                <a class="btn btn-primary" href="{{ route('jokes.edit', $joke->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @method('GET')
                                <a class="btn btn-success" href="{{ route('jokes.show', $joke) }}">Show Categories</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $jokes->links() !!}
    </div>
</body>

</html>
