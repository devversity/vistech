<div class="input-group date mb-3" {!! $disabled === false ? 'data-provide="datepicker"' : '' !!}>
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    <input type="input" name="{{$field->name}}" type="text" class="form-control" id="field_{{$field->id}}" value="{{isset($value) ? $value : $field->default}}" {{$disabled ? 'disabled' : ''}}>
    @if($disabled === false)
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
    @endif
</div>
