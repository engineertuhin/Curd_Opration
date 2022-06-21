<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="card shadow" style="margin: auto;width:40%;margin-top:5%">
        <div class="card-header">
          Create user
        </div>
        <div class="card-body">
            <form action="{{route('userinsert')}}" method="POST" enctype= multipart/form-data>
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input  name="name" type="text" class="form-control {{$errors->has('name') ?  "is-invalid" : " " }}" id="name" value="{{old('name')}}" aria-describedby="emailHelp">
                  @if ($errors->has('name'))
                  <div id="name" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input name="email" type="text" class="form-control  {{$errors->has('email') ?  "is-invalid" : " " }}" id="email" value="{{old('email')}}">
                  @if ($errors->has('email'))
                  <div id="email" class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="number" class="form-label">Nunber</label>
                  <input name="number" type="text" class="form-control {{$errors->has('number') ?  "is-invalid" : " " }}" id="number" value="{{old('number')}}">
                  @if ($errors->has('number'))
                  <div id="number" class="invalid-feedback">
                    {{$errors->first('number')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input name="image" type="file" class="form-control  {{$errors->has('image') ?  "is-invalid" : " " }}" id="image">
                  @if ($errors->has('image'))
                  <div id="image" class="invalid-feedback">
                    {{$errors->first('image')}}
                  </div>
                  @endif
                </div>
               
                <button name="submit" type="submit" class="btn btn-primary">Insert</button> <a href="{{url('/')}}" class="btn btn-danger">Back</a>
              </form>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>