@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row justify-content-between">
  <div class="col-8">
    <h1>Administrador de productos</h1>
  </div>
  <div class="col-4 text-right">
    <a class="btn btn-dark" href="{{route('storage.create')}}">Registrar producto</a>
  </div>
</div>

<div class="row mt-3">
  <div class="col-12">
    <div class="card shadow">
      <!-- Card Header - Dropdown -->
      <!-- Card Body -->
      <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Categoria</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Cantidad</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($storages as $storage)
                        <tr>
                      <th scope="col">{{ $storage->id }}</th>
                      <th scope="col">{{ $storage->category }}</th>
                      <th scope="col">{{ $storage->name }}</th>
                      <th scope="col">{{ number_format($storage->price,2) }}</th>
                      <th scope="col">{{ $storage->total }}</th>
                      <th><a href="{{ route('storage.edit', $storage->id) }}" class="btn btn-dark">Editar</a></th>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center">No se encontraron registros</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection