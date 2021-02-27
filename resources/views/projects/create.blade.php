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
<div class="container pt-5">
    <h1 class="heading">Create Project</h1>
    <form class="row g-3">
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Project title</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Slug</label>
            <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">Primary image</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="col-md-4">
            <label class="form-label">Project category</label>
            <select class="form-select" aria-label="Default select example">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Client</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Year</label>
            <input type="text" class="form-control" id="inputPassword4">
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
        <div class="col-md-12">
            <label for="inputAddress2" class="form-label">Project URL</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="https://github.com/mirodil1999">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>


<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
