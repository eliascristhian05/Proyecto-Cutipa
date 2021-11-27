<x-app-layout>
    <x-slot name="header"><br/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}}
</div>

@endif

<a href="{{ url('categories/create') }}" class="btn btn-success">Agregar Categoria</a>
<br/><br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nro</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->description}}</td> 
    
            <td>
                <a class="btn btn-warning" href="{{ url('/categories/'.$category->id.'/edit') }}">
                Editar
                </a>
                
                <form method="post" action="{{ url('/categories/'.$category->id) }}" style="display:inline">
                {{csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $categories->links() }}
</x-app-layout>


