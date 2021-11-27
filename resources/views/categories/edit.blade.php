<x-app-layout>
    <x-slot name="header"><br/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

Seccion para editar Categoria
<form action="{{ url('/categories/'.$category->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('categories.form',['Modo'=>'editar'])

</form>
</x-app-layout>