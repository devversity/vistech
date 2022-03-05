<?php
$options = json_decode($field->options);
?>
<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
@if(!empty($options))
    @foreach ($options as $option)
    <input type="radio" id="field_{{$field->id}}_{{$option}}" name="{{$field->name}}" value="{{$option}}" {{ isset($value) && $value === $option ? 'checked' : ''}} {{$disabled ? 'disabled' : ''}}>
    <label for="field_{{$field->id}}_{{$option}}">{{$option}}</label>
    @endforeach
@endif
</div>
