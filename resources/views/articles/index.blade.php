@extends("temasLady.app")

@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista de Articulos")}}</h1>
        <a href="{{route("articles.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir Articulo")}}
        </a>
        </div>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Descripcion")}}</th>
            <th class="px-4 py-2">{{ __("Precio de Compra")}}</th>
            <th class="px-4 py-2">{{ __("Precio de venta")}}</th>
            <th class="px-4 py-2">{{ __("Categoria")}}</th>
            
            <th class="px-4 py-2">{{ __("Acciones")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
                <tr>
                    <td class="border px-4 py-2">{{ $article->Description }}</td>
                    <td class="border px-4 py-2">{{ $article->shopping_price }}</td>
                    <td class="border px-4 py-2">{{ $article->sale_price }}</td>
                    

                    @foreach($categories as $category)
                    @if($category->id_category == $category->id)
                    <td class="border px-4 py-2">{{$category->description}}</td>
                    @endif
                    @endforeach

                    <td class="border px-4 py-2">{{ date_format($article->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route("articles.edit", ["article" => $article]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-article-{{ $article->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-article-{{ $article->id }}-form" action="{{ route("articles.destroy", ["article" => $article]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay articulos") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    @if($articles->count())
        <div class="mt-3">
            {{ $articles->links() }}
        </div>
    @endif

@endsection