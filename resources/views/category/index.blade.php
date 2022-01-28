@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row justify-content-between">
  <div class="col-8">
    <h1>Administrador de categorias</h1>
  </div>
  <div class="col-4 text-right">
    <a class="btn btn-dark" href="{{route('category.create')}}">Registrar categoria</a>
  </div>
</div>

<div class="row mt-3">
  <div class="col-12">
    <div class="card shadow mb-5">
      <!-- Card Header - Dropdown -->
      <!-- Card Body -->
      <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $category)
                        <tr>
                      <th scope="col">{{ $category->id }}</th>
                      <th scope="col">{{ $category->name }}</th>
                      <th><a href="{{ route('category.edit', $category->id) }}" class="btn btn-dark">Editar</a></th>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="3" class="text-center">No se encontraron registros</td>
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