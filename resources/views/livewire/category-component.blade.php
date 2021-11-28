<div>
    <button class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Categoria
    </button>
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
                <td>{{$category->id}}</td>
                <td>{{$category->description}}</td> 
        
                <td>
                    <button wire:click="edit({{ $category->id }})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        Editar
                    </button>
                    <button class="btn btn-danger" type="submit">Borrar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$nombre}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="description" class="control-label">{{'Descripción:'}}</label>
                    <input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}}" name="description" id="description" value="{{ isset($category->description)?$category->description:old('description') }}">
                    {!! $errors->first('description','<div class="invalid-feedback">:message</div>') !!}
                </div>                    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Guardar Categoria</button>
            </div>
        </div>
        </div>
    </div>

</div>
