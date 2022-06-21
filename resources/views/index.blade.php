<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong>     {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
        @endif
    <a href="{{route('userCreare')}}" class="btn btn-info  text-white ">Create</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Numbar</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $value )
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->number}}</td>
                <td><img height="100" class="rounded-circle" src="{{asset('image/'.$value->image)}}" alt=""></td>
                <td><a href="{{route('userEdit',$value->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{route('deleteuser',$value->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="image" value="{{$value->image}}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                    </form>
              </tr>
            @endforeach
        </tbody>
      </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>