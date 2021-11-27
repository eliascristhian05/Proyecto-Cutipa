@extends("temasLady.app")

@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista de Sales")}}</h1>
        <a href="{{route("sales.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir sales")}}
        </a>
        </div>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Nro")}}</th>
            <th class="px-4 py-2">{{ __("Cantidad")}}</th>
            <th class="px-4 py-2">{{ __("Nombre del personal")}}</th>
            <th class="px-4 py-2">{{ __("Nombre del usuario")}}</th>
            <th class="px-4 py-2">{{ __("Fecha")}}</th>
            <th class="px-4 py-2">{{ __("Acciones")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                     <td class="border px-4 py-2">{{ $sale->id }}</td>
                    <td class="border px-4 py-2">{{ $sale->quantity }}</td>
                   
                    @foreach($employees as $employee)
                    @if($sale->id_employee == $employee->id)
                    <td class="border px-4 py-2">{{ $employee->name}} {{ $employee->surname}}</td>
                    @endif
                    @endforeach


                    @foreach($clients as $client)
                    @if($sale->id_client == $client->id)
                    <td class="border px-4 py-2">{{ $client->name}} {{ $client->surnames}}</td>
                    @endif
                    @endforeach


                    <td class="border px-4 py-2">{{ $sale->date }}</td>
                    
                 
                   
                    <td class="border px-4 py-2">
                        <a href="{{ route("sales.edit", ["sale" => $sale]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-sale-{{ $sale->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-sale-{{ $sale->id }}-form" action="{{ route("sales.destroy", ["sale" => $sale]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay SALES ") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    @if($sales->count())
        <div class="mt-3">
            {{ $sales->links() }}
        </div>
    @endif

@endsection