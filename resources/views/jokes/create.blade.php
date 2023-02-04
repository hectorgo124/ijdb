<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Joke Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@include('navbar')

<body class="bg-secondary text-light">
    <div class="container mt-2 bg-dark p-3 border border-white rounded">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Joke</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('jokes.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('jokes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Joke Joketext:</strong>
                        <input type="text" name="joketext" class="form-control" placeholder="Joke Joketext">
                        @error('joketext')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Joke Jokedate:</strong>
                        <input type="date" name="jokedate" class="form-control" placeholder="Joke Jokedate">
                        @error('jokedate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author:</strong>
                        <select name="authorid">
                            <option value="">Select one</option>
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">
                                {{ $author->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('authorid')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>