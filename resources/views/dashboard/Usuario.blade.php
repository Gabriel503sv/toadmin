@extends('dashboard.Recursos.index')

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn  btn-dark " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Registra nuevo usuario
    </button>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <small>
                {{ session('success') }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="m-auto  w-form">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('email')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            @error('password')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                id="exampleInputPassword1">
                            @error('password_confirmation')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit text-center" class="btn  btn-dark  "
                                style="--bs-btn-opacity: .5;">REGISTRAR</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <button disabled href="#" style="width: 100%"
                                class="btn btn-secondary  mb-3">Editar</button>
                            <form method="POST" action="{{ route('destroy', $user->id) }}">
                                @method('DELETE')
                                @csrf
                                <button disabled class="btn btn-danger " style="width: 100%">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
