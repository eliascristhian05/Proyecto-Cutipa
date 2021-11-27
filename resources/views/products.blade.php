@extends('layouts.layout')

@section('content')
    

    <div class="row ">
        <a href="{{url('cart/')}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Carrito de Compras</a>
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mt-3">
                    <div class="card-header">Productos</div>
                        <div class="card-body">                   
                            {{-- Agregar productos --}}      
                            <center>
                                <img src="img/{{$product->imagen}}" width="50%" alt="">
                            </center>
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p><strong>Precio: </strong> {{ $product->price }}Bs</p>
                            <a href="{{url('add-to-cart/'.$product->id)}}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Agregar al Carrito</a>
                            <a href="{{url('product-detail/'.$product->id)}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Detalle</a>
                            {{-- Agregar Productos --}}
                    </div>                              
                </div>
            </div>
        @endforeach
    </div>


@endsection
