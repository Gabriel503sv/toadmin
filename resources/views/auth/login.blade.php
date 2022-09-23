<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
  <body>
    <div class="container d-flex  ">
        <form action="{{route('login.verify')}}" method="POST" class="m-auto bg-white  p-5 rounded-sm shadow-lg w-form border border-dark rounded">
            @csrf
            <h3 class="text-center">
                LOGIN ADMINISTRADOR
            </h3>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small>
                        {{session('success')}}
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @error('invalid_credentials')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>
                        {{$message}}
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @enderror
            <img class="mb-3 mx-auto d-block" src="{{asset('Logos/favicon_lalishop.png')}}" width="300px">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>              
            </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit text-center" class="btn  btn-dark  " style="--bs-btn-opacity: .5;">INGRESAR</button>
            </div>
              
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>