<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Joke Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@include('navbar')

<body class="bg-secondary text-light">
    <div class="container mt-2 bg-dark p-3 border border-white rounded">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Joke</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('jokes.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('jokes.update', $joke->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Joke Name:</strong>
                        <input type="text" name="joketext" value="{{ $joke->joketext }}" class="form-control"
                            placeholder="Joke Text">
                        @error('joketext')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Joke Date:</strong>
                        <input type="date" name="jokedate" class="form-control" placeholder="Joke Date"
                            value="{{ $joke->jokedate }}">
                        @error('jokedate')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author:</strong>
                        <select name="authorid">
                            <option value="{{ $joke->authorid }}">
                                @foreach ($authors as $author)
                                    @if ($author->id == $joke->authorid)
                                        {{ $author->name }}
                                    @endif
                                @endforeach
                            </option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('authorid')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong><br>
                        @foreach ($categories as $category)
                            <label for="category">{{ $category->name }}
                                @isset($jokeCategories)
                                    @php
                                        $aux = true;
                                    @endphp
                                    @foreach ($jokeCategories as $jokeCategory)
                                        @if ($category->id == $jokeCategory->categoryid)
                                            <input type="checkbox" name="categoryid[]" value="{{ $category->id }}" checked>

                                            @php
                                                $aux = false;
                                            @endphp
                                        @break
                                    @endif
                                @endforeach

                                @if ($aux)
                                    <input type="checkbox" name="categoryid[]" value="{{ $category->id }}">
                                @endif
                            @else
                                <input type="checkbox" name="categoryid[]" value="{{ $category->id }}">
                        @endif

                        </label>
                        <br>
                        @endforeach
                        @error('categoryid')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
    @error('name')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</body>

</html>
