<div class="w-full max-w-lg">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form class="w-full max-w-lg" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    

    <div class="flex flex-wrap -mx-3 mb-6">
        
    
        <div class="w-full px-3">
            
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Nombre del Proveedor") }}
            </label>
            
                <select name="id_provider"  id="id_provider" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}">{{$provider->name_provider}} {{$provider->surnames}}</option>
                @endforeach
                </select>
            
            
            <p class="text-gray-600 text-xs italic">{{ __("Lista del Proveedor") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            
        </div>
        
    </div>


    <div class="flex flex-wrap -mx-3 mb-6">
        
    
        <div class="w-full px-3">
            
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Nombre del Personal") }}
            </label>
            
                <select name="id_employee"  id="id_employee" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{$employee->name}} {{$employee->surname}}</option>
                @endforeach
                </select>
            
            
            <p class="text-gray-600 text-xs italic">{{ __("Lista del personal") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            
        </div>
        
    </div>


    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Fecha") }}
            </label>
            <input name="shopping_date" value="{{ old("shopping_date") ?? $shopping->shopping_date }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="date" type="date">
            <p class="text-gray-600 text-xs italic">{{ __("Fecha ") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>



    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Cantidad") }}
            </label>
            <input name="shopping_quantity" value="{{ old("shopping_quantity") ?? $shopping->shopping_quantity }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="quantity" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Cantidad") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


   

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>