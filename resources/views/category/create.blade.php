@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar categoria</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('category.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('category.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection