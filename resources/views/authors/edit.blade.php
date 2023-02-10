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
                <div class="pull-left">
                    <h2>Edit Author</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('authors.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author Name:</strong>
                        <input type="text" name="name" value="{{ $author->name }}" class="form-control"
                            placeholder="Author name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Author Email"
                            value="{{ $author->email }}">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author Password:</strong>
                        <input type="password" name="password" value="{{ $author->password }}" class="form-control">
                        @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong><br>
                        @foreach ($roles as $role)
                            <label for="role">{{ $role->description }}
                                @isset($authoroles)
                                    @php
                                        $aux = true;
                                    @endphp
                                    @foreach ($authorroles as $authorrole)
                                        @if ($role->id == $authorole->roleid)
                                            <input type="checkbox" name="roleid[]" value="{{ $role->id }}" checked>
                                            @php
                                                $aux = false;
                                            @endphp
                                        @break
                                    @endif
                                @endforeach

                                @if ($aux)
                                    <input type="checkbox" name="roleid[]" value="{{ $role->id }}">
                                @endif
                            @else
                                <input type="checkbox" name="roleid[]" value="{{ $role->id }}">
                        @endif

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
