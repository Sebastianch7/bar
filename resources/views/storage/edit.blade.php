@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar Producto</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('storage.update', $storage[0]->id) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idCategory">Categoria</label>
              <select class="form-control" name="idCategory" value=" {{$storage[0]->idCategory }}">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value=" {{$storage[0]->name }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="price">Precio</label>
              <input type="text" class="form-control" name="price" value=" {{$storage[0]->price }}">
            </div>
            <div class="form-group col-md-6">
              <label for="total">Cantidad</label>
              <input type="text" class="form-control" name="total" value=" {{$storage[0]->total }}">
            </div>
          </div>
          @csrf
          @method('PUT')
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('storage.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection