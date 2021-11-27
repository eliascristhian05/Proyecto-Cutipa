<x-app-layout>
    <x-slot name="header">
</br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de Productos</div>
                <a href="{{url('products/')}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Productos</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    {{-- Detalle productos --}}
                        <div class="row">
                                <div class="col-6">
                                    <img src="img/$product->imagen" width="300" height="300">
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->description }}</p>
                                    <p><strong>Precio: </strong> {{ $product->price }}Bs</p>

                                 </div>  
                        </div>
                    {{-- Detalle Productos --}}
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>