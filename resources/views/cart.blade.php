@extends('layouts.layout')

@section('content')
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carrito de Compras</div>
                <a href="{{route('products')}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">
                    Seguir comprando 😃
                </a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    {{-- Agregar detalle Carrito --}}
                        <?php $valor = 0 ?>

                            @if(session('cart'))

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            Productos
                                        </th>
                                        <th>
                                            Precio Unitario
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                        <th>
                                            Precio Total
                                        </th>
                                        <th>
                                            Foto
                                        </th>
                                    </tr>
                                <thead>

                                @foreach(session('cart') as $id => $details)
                                    <?php $valor += $details['price'] * $details['quantity'] ?>
                                <tr>
                                    <td>
                                    {{ $details['name']}}
                                    </td>
                                    <td>
                                    Bs./{{ $details['price']}}
                                    </td>
                                    <td>
                                    {{$details['quantity']}}
                                    </td>
                                    <td>
                                    Bs{{$details['price'] * $details['quantity']}}
                                    </td>
                                    <td>
                                    <img src="img/{{ $details['imagen'] }}" width="50" height="50"/>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif

                            <table align="right">
                                <th>
                                    <div class="badge badge-primary text-wrap" style="width: 10rem;">
                                    <p></p>
                                    <p>Total Bs./{{ $valor}}</p>
                                    
                                    </div>
                                </th>
                            </table>

                            <div id="paypal-button-container"></div>


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '88.44'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }


    }).render('#paypal-button-container');
</script>

                    {{-- Agregar detalle Carrito --}}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
