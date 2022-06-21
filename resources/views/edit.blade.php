<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="card shadow" style="margin: auto;width:40%;margin-top:5%">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong>     {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
        @endif
        <div class="card-header">
           Edit
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
            <img height="120" class="rounded-circle" src="{{asset('image/'.$get->image)}}" alt="">
        </div>
            <form action="{{route('updateUser',$get->id)}}" method="POST" enctype= multipart/form-data>
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input  name="name" type="text" class="form-control {{$errors->has('name') ?  "is-invalid" : " " }}" id="name" value="{{$get->name}}"  aria-describedby="emailHelp">
                  @if ($errors->has('name'))
                  <div id="name" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input name="email" type="text" class="form-control  {{$errors->has('email') ?  "is-invalid" : " " }}" id="email" value="{{$get->email}}">
                  @if ($errors->has('email'))
                  <div id="email" class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="number" class="form-label">Nunber</label>
                  <input name="number" type="text" class="form-control {{$errors->has('number') ?  "is-invalid" : " " }}" id="number" value="{{$get->number}}">
                  @if ($errors->has('number'))
                  <div id="number" class="invalid-feedback">
                    {{$errors->first('number')}}
                  </div>
                  @endif
                </div>
                <input type="hidden" name='oldimage' value="{{$get->image}}">
                <div class="mb-3">
                  <label for="image" class="form-label">New Image</label>
                  <input name="newimage" type="file" class="form-control  {{$errors->has('newimage') ?  "is-invalid" : " " }}" id="image">
                  @if ($errors->has('newimage'))
                  <div id="image" class="invalid-feedback">
                    {{$errors->first('newimage')}}
                  </div>
                  @endif
                </div>
               
                <button name="submit" type="submit" class="btn btn-primary">Upadate</button> <a href="{{url('/')}}" class="btn btn-danger">Back</a>
              </form>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>