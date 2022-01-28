@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row justify-content-between">
  <div class="col-lg-8 col-md-12 col-sm-12">
    <h1>Administrador de cuentas</h1>
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12 text-right">
    <a class="btn btn-dark" href="{{ route('client.index') }}">Nueva cuenta</a>
  </div>
</div>

<div class="row">

    @forelse ($clients as $client)
    <div class="col-lg-4 col-md-6 col-sm-12 mt-3 mb-5">
        <div class="card">
            <div class="card-body">
                <p class="card-text"></p>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="3" class="text-center">Cuenta # {{ $client->id }}</th>
                        </tr>
                        <tr>
                            <th>Item</th>
                            <th>Unidades</th>
                            <th>Total</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @forelse ($sales as $sale)
                        @if($client->id == $sale->client)
                        <tr>
                            <th scope="col"class="cuenta_{{ $sale->client }}">{{ $sale->product }}</th>
                            <th scope="col"class="cuenta_{{ $sale->client }}">{{ $sale->cant }}</th>
                            <th scope="col"class="cuenta_{{ $sale->client }}">{{ number_format($sale->total,2) }}</th>
                        </tr>
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('sales.order', $client->id) }}" class="btn btn-dark col-lg-12 col-md-12 col-sm-12 mb-2">Agregar producto</a>
                <a href="{{ route('sales.edit', $client->id) }}" class="btn btn-danger float-right  col-lg-12 col-md-12 col-sm-12">Terminar cuenta</a>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    
</div>
@endsection