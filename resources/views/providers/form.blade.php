<div class="form-group">
<label for="CI" class="control-label">{{'C.I:'}}</label>
<input type="text" class="form-control {{$errors->has('CI')?'is-invalid':''}}" name="CI" id="CI" value="{{ isset($provider->CI)?$provider->CI:old('CI') }}">
    {!! $errors->first('CI','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="name_provider" class="control-label">{{'Nombre:'}}</label>
<input type="text" class="form-control {{$errors->has('name_provider')?'is-invalid':''}}" name="name_provider" id="name_provider" value="{{ isset($provider->name_provider)?$provider->name_provider:old('name_provider') }}">
    {!! $errors->first('name_provider','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="surnames" class="control-label">{{'Apellidos:'}}</label>
<input type="text" class="form-control {{$errors->has('surnames')?'is-invalid':''}}" name="surnames" id="surnames" value="{{ isset($provider->surnames)?$provider->surnames:old('surnames') }}">
    {!! $errors->first('surnames','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="direction" class="control-label ">{{'Dirección:'}}</label>
<input type="text" class="form-control {{$errors->has('direction')?'is-invalid':''}}" name="direction" id="direction" value="{{ isset($provider->direction)?$provider->direction:old('direction') }}">
    {!! $errors->first('direction','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="phone" class="control-label">{{'Teléfono:'}}</label>
<input type="text" class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" id="phone" value="{{ isset($provider->phone)?$provider->phone:old('phone') }}">
    {!! $errors->first('phone','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">

<a class="btn btn-primary" href="{{ url('providers') }}">Regresar</a>