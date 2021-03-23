<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <title>Create Category</title>
</head>
<body>
@if(Session::has('alert-success'))
    <div class="flash-message">
        <p class="alert alert-success">{{ Session::get('alert-success') }}</p>
    </div>
@endif

<div class="container pt-5">
    <h1 class="heading">Create Category</h1>
    <form class="row g-3" action="store" method="post">
        @csrf
        <div class="col-md-4">
            <label for="category_ru" class="form-label">Category (ru)</label>
            <input type="text" class="form-control @error('category_ru') is-invalid @enderror" id="category_ru"
                   name="category_ru"
                   value="{{  old('category_ru')  }}">
            @error('category_ru')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="category_en" class="form-label">Category (en)</label>
            <input type="text" class="form-control @error('category_en') is-invalid @enderror" id="category_en"
                   name="category_en"
                   value="{{  old('category_en')  }}">
            @error('category_en')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="category_uz" class="form-label">Category (uz)</label>
            <input type="text" class="form-control @error('category_uz') is-invalid @enderror" id="category_uz"
                   name="category_uz"
                   value="{{  old('category_uz')  }}">
            @error('category_uz')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>


<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
