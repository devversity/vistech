<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    <input type="input" name="{{$field->name}}" class="form-control" id="field_{{$field->id}}" value="{{isset($value) ? $value : $field->default}}" {{$disabled ? 'disabled' : ''}}>
</div>
