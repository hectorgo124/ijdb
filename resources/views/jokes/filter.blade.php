<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jokes List </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@include('navbar')

<body class="bg-secondary text-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    @if ($isAuthor)
                        <h2>Jokes List of Author {{ $author->name }}</h2>
                    @else
                        <h2>Jokes List of Category {{ $category->name }}</h2>
                    @endif



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
                    <th width="350px">Action</th>
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
                                    @method('GET')
                                    <a class="text-white"
                                        href="{{ route('authors.show', $author->id) }}">{{ $author->name }}</a>
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
                                @if (!$isAuthor)
                                    @method('GET')
                                    <a class="btn btn-success" href="{{ route('jokes.show', $joke->id) }}">Show
                                        Categories</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
