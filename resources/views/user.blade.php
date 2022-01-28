@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row justify-content-between">
  <div class="col-4">
    <h1>Usuario</h1>
  </div>
  <div class="col-4 text-right">
    <a class="btn btn-dark" href="route('storage.create')">Agregar producto</a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-5  ">
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
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                        <tr>
                      <th scope="col">{{ $user->id }}</th>
                      <th scope="col">{{ $user->name }}</th>
                      <th scope="col">{{ $user->email }}</th>
                      <th><button class="btn btn-dark">Prueba</button></th>
                    </tr>
                    @empty
                        <p>No hay usuarios.</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection