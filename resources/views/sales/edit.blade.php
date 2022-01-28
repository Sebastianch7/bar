@extends('layouts.app')
@section('content')
@php
$valor = 0;
$cant = 0;
@endphp
<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 mx-auto">
    <div class="card">
      <div class="card-header">
        Cuenta # {{ $client }}
      </div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          - {{ $error }}<br>
          @endforeach
        </div>
        @endif
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Item</th>
              <th>Unidades</th>
              <th>Total</th>
            </tr>
          </thead>    
          <tbody>
            @forelse ($sales as $sale)
            @php
            $valor += $sale->total; 
            $cant += $sale->cant; 
            @endphp
            <tr>
              <th scope="col" class="cuenta_{{ $sale->client }}">{{ $sale->product }}</th>
              <th scope="col" class="cuenta_{{ $sale->client }}">{{ $sale->cant }}</th>
              <th scope="col" class="cuenta_{{ $sale->client }}">{{ number_format($sale->total,2) }}</th>
            </tr>
            @empty
            @endforelse
          </tbody>
          <tfoot>
            <tr class="table-success">
              <th scope="col">Total</th>
              <th scope="col">{{ $cant }}</th>
              <th scope="col">{{ number_format($valor,2) }}</th>
            </tr>
          </tfoot>
        </table>
        <form action="{{ route('client.update', $client) }}" method="POST">
          <div class="form-row">
            <input type="hidden" value="2" name="state">
            <div class="form-group col-md-6 float-right">
              <label for="pay">Método de pago</label>
              <select class="form-control" name="pay">
                <option value="1">Efectivo</option>
                <option value="2">Nequi</option>
                <option value="3">Daviplata</option>
              </option>
            </select>
          </div>
        </div>
        @csrf
        @method('PUT')
        <div class="float-right">
          <button type="submit" class="btn btn-primary">Terminar cuenta</button>
        </form>
        <a class="btn btn-secondary" href="{{ route('sales.index') }}">Cancelar</a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection