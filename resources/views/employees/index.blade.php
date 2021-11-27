@extends("temasLady.app")

@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista del Personal")}}</h1>
        <a href="{{route("employees.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir Personal")}}
        </a>
        </div>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Nombres")}}</th>
            <th class="px-4 py-2">{{ __("Apellidos")}}</th>
            <th class="px-4 py-2">{{ __("Cargo")}}</th>
            <th class="px-4 py-2">{{ __("Direccion")}}</th>
            <th class="px-4 py-2">{{ __("C.I")}}</th>
            <th class="px-4 py-2">{{ __("Telefono")}}</th>
            <th class="px-4 py-2">{{ __("Calendario?")}}</th>
            <th class="px-4 py-2">{{ __("Salario")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td class="border px-4 py-2">{{ $employee->name }}</td>
                    <td class="border px-4 py-2">{{ $employee->surname }}</td>
                    <td class="border px-4 py-2">{{ $employee->direction }}</td>

                    @foreach($positions as $position)
                    @if($position->id_position == $position->id)
                    <td class="border px-4 py-2">{{$position->description}}</td>
                    @endif
                    @endforeach
                    <td class="border px-4 py-2">{{ $employee->CI }}</td>
                    <td class="border px-4 py-2">{{ $employee->phone }}</td>
                    <td class="border px-4 py-2">{{ $employee->salary }}</td>
                    <td class="border px-4 py-2">{{ $employee->schedule }}</td>
                    <td class="border px-4 py-2">{{ date_format($employee->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route("employees.edit", ["employee" => $employee]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-employee-{{ $employee->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-employee-{{ $employee->id }}-form" action="{{ route("employees.destroy", ["employee" => $employee]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay Personal") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    @if($employees->count())
        <div class="mt-3">
            {{ $employees->links() }}
        </div>
    @endif

@endsection