<?php
$options = json_decode($field->options);
$otherValue = isset($formData[$field->name . '_other']) ? $formData[$field->name . '_other'] : '';
?>

<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    @if(!empty($options))
        @foreach ($options as $option)
            <br/>
            <input type="checkbox" id="field_{{$option}}" name="{{$field->name}}[]" value="{{$option}}" {{ !empty($value) && is_array($value) && in_array($option, $value) ? 'checked' : ''}} {{$disabled ? 'disabled' : ''}}>
            <label for="field_{{$option}}">{{$option}}</label>
        @endforeach
    @endif
    <br/>
    <label for="field_{{$field->id}}_other">Other (please specify)</label>
    <input type="input" name="{{$field->name}}_other" class="form-control" id="field_{{$field->id}}_other"  value="{{isset($otherValue) ? $otherValue : $field->default}}" {{$disabled ? 'disabled' : ''}}>
</div>
