<div class="form-group">
<label for="name" class="control-label">{{'Nombre:'}}</label>
<input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" id="name" value="{{ isset($client->name)?$client->name:old('name') }}">
    {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="surnames" class="control-label">{{'Apellidos:'}}</label>
<input type="text" class="form-control {{$errors->has('surnames')?'is-invalid':''}}" name="surnames" id="surnames" value="{{ isset($client->surnames)?$client->surnames:old('surnames') }}">
    {!! $errors->first('surnames','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="direction" class="control-label ">{{'Dirección:'}}</label>
<input type="text" class="form-control {{$errors->has('direction')?'is-invalid':''}}" name="direction" id="direction" value="{{ isset($client->direction)?$client->direction:old('direction') }}">
    {!! $errors->first('direction','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="phone" class="control-label">{{'Teléfono:'}}</label>
<input type="text" class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" id="phone" value="{{ isset($client->phone)?$client->phone:old('phone') }}">
    {!! $errors->first('phone','<div class="invalid-feedback">:message</div>') !!}
</div>


<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">

<a class="btn btn-primary" href="{{ url('clients') }}">Regresar</a>