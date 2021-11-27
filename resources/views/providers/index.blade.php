<x-app-layout>
    <x-slot name="header"><br/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}}
</div>

@endif

<a href="{{ url('providers/create') }}" class="btn btn-success">Agregar Proveedor</a>
<br/><br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nro</th>
            <th>C.I</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($providers as $provider)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$provider->CI}}</td> 
            <td>{{$provider->name_provider}}</td>
            <td>{{$provider->surnames}}</td>
            <td>{{$provider->direction}}</td>
            <td>{{$provider->phone}}</td>
            <td>
                <a class="btn btn-warning" href="{{ url('/providers/'.$provider->id.'/edit') }}">
                Editar
                </a>
                
                <form method="post" action="{{ url('/providers/'.$provider->id) }}" style="display:inline">
                {{csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $providers->links() }}
</x-app-layout>