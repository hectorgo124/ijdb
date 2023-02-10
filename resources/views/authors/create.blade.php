<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IJDB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@include('navbar')

<body class="bg-secondary text-light">
    <div class="container mt-2 bg-dark p-3 border border-white rounded">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Author</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('authors.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Author Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Author Email">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="password">
                        @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong> <br>
                        @foreach ($roles as $role)
                            <label for="role">{{ $role->description }}
                                <input type="checkbox" name="roleid[]" value="{{ $role->id }}">
                            </label>
                            <br>
                        @endforeach
                        @error('roleid')
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
