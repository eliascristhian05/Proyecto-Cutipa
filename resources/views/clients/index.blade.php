<x-app-layout>
    <x-slot name="header"><br/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}}
</div>

@endif

<a href="{{ url('clients/create') }}" class="btn btn-success">Agregar Cliente</a>
<br/><br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surnames}}</td>
            <td>{{$client->direction}}</td>
            <td>{{$client->phone}}</td>
            <td>
                <a class="btn btn-warning" href="{{ url('/clients/'.$client->id.'/edit') }}">
                Editar
                </a>
                
                <form method="post" action="{{ url('/clients/'.$client->id) }}" style="display:inline">
                {{csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $clients->links() }}
</x-app-layout>
