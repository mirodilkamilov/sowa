{{--TODO: save old value of category--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <title>Create Projects</title>
</head>
<body>
@if(Session::has('alert-success'))
    <div class="flash-message">
        <p class="alert alert-success">{{ Session::get('alert-success') }}</p>
    </div>
@endif

<div class="container pt-5">
    <h1 class="heading">Create Project (RU)</h1>
    <form class="row g-3" action="store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Project title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEmail4" name="title"
                   value="{{  old('title')  }}">
            @error('title')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="inputPassword4" name="slug"
                   value="{{  old('slug')  }}">
            @error('slug')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">Primary image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
            @error('image')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label">Project category</label>
            <select class="form-select @error('category') is-invalid @enderror" aria-label="Project category"
                    name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category['ru'] }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Client</label>
            <input type="text" class="form-control @error('client') is-invalid @enderror" id="inputEmail4" name="client"
                   value="{{  old('client')  }}">
            @error('client')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Year</label>
            <input type="text" class="form-control @error('year') is-invalid @enderror" id="inputPassword4" name="year"
                   value="{{  old('year')  }}">
            @error('year')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                      name="description">{{  old('description')  }}</textarea>
            @error('description')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="inputAddress2" class="form-label">Project URL</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="inputAddress2"
                   placeholder="https://github.com/mirodil1999" name="url" value="{{  old('url')  }}">
            @error('url')
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
