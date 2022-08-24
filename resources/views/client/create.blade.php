@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Nueva cuenta</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('client.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Cliente</label>
              <input type="text" class="form-control" name="name" required>
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('client.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection