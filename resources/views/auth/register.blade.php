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
    <div class="container d-flex">
        <form action="" method="POST" class="m-auto bg-white  p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">
                Registrar
            </h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">              
                @error('email')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
                @error('password_confirmation')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
            
              <button type="submit" class="btn btn-primary">Registrarme</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>