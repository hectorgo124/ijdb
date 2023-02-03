<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jokes List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Joke Name</th>
                    <th>Joke Email</th>
                    <th>Joke Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jokes as $joke)
                <tr>
                    <td>{{ $joke->id }}</td>
                    <td>{{ $joke->joketext }}</td>
                    <td>{{ $joke->jokedate }}</td>
                    <td>{{ $joke->authorid}}</td>
                    <td>
                        <form action="{{ route('jokes.destroy',$joke->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('jokes.edit',$joke->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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