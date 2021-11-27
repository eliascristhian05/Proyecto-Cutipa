<div class="form-group">
<label for="description" class="control-label">{{'Descripción:'}}</label>
<input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}}" name="description" id="description" value="{{ isset($category->description)?$category->description:old('description') }}">
    {!! $errors->first('description','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">

<a class="btn btn-primary" href="{{ url('categories') }}">Regresar</a>