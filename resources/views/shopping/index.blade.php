@extends("temasLady.app")

@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista de Compras")}}</h1>
        <a href="{{route("shopping.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir Compras")}}
        </a>
        </div>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Nro")}}</th>
            <th class="px-4 py-2">{{ __("Proveedor")}}</th>
            <th class="px-4 py-2">{{ __("Personal")}}</th>
            <th class="px-4 py-2">{{ __("Fecha")}}</th>
            <th class="px-4 py-2">{{ __("Cantidad")}}</th>
            <th class="px-4 py-2">{{ __("Modificación")}}</th>
            <th class="px-4 py-2">{{ __("Acciones")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shoppings as $shopping)
                <tr>
                    <td class="border px-4 py-2">{{ $shopping->id }}</td>
                   
                    @foreach($providers as $provider)
                    @if($shopping->id_provider == $provider->id)
                    <td class="border px-4 py-2">{{ $provider->name_provider}} {{$provider->surnames}}</td>
                    @endif
                    @endforeach   
                    

                    @foreach($employees as $employee)
                    @if($shopping->id_employee == $employee->id)
                    <td class="border px-4 py-2">{{ $employee->name}} {{$employee->surname}}</td>
                    @endif
                    @endforeach


                    <td class="border px-4 py-2">{{ $shopping->shopping_date}}</td>
                    <td class="border px-4 py-2">{{ $shopping->shopping_quantity }}</td>
                 
                    <td class="border px-4 py-2">{{ date_format($shopping->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route("shopping.edit", ["shopping" => $shopping]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-shopping-{{ $shopping->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-shopping-{{ $shopping->id }}-form" action="{{ route("shopping.destroy", ["shopping" => $shopping]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay Compra ") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    @if($shoppings->count())
        <div class="mt-3">
            {{ $shoppings->links() }}
        </div>
    @endif

@endsection