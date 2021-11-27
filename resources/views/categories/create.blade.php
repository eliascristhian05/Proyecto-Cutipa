<x-app-layout>
    <x-slot name="header"><br/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)

        <li> {{ $error }} </li>
        
        @endforeach
    </ul>
</div>
@endif

Seccion para crear Categoria
<form action="{{ url('/categories')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}

@include('categories.form',['Modo'=>'crear'])


</form>
</x-app-layout>