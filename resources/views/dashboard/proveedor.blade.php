@extends('dashboard.Recursos.index')

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn  btn-dark " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Registra nuevo Proveedor
    </button>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <small>
                {{ session()->get('success') }}
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
                    <h5 class="modal-title" id="staticBackdropLabel">PROVEEDOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="m-auto w-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre del proveedor</label>
                            <input name="nombre_proveedor" type="text" class="form-control">
                            @error('nombre_proveedor')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <input name="direccion_proveedor" type="text" class="form-control">
                            @error('direccion_proveedor')
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
                    <th scope="col">Proveedor</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $key => $proveedor)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $proveedor->nombre_proveedor}}</td>
                        <td>{{ $proveedor->direccion_proveedor }}</td>
                        <td>
                            <button disabled style="width: 50%" href="{{ route('proveedor.edit', $proveedor->id_proveedor) }}"
                                class="btn btn-secondary mb-3">Editar</button>
                            <form method="POST" action="{{ route('proveedor.destroy', $proveedor->id_proveedor) }}">
                                @method('DELETE')
                                @csrf
                                <button disabled style="width: 50%" class="btn btn-danger">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
