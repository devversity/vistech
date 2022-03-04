<?php
$options = json_decode($field->options);
?>

<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    @if(!empty($options))
        @foreach ($options as $option)
            <br/>
            <input type="checkbox" id="field_{{$option}}" name="{{$field->name}}[]" value="{{$option}}">
            <label for="field_{{$option}}">{{$option}}</label>
        @endforeach
    @endif
    <br/>
    <label for="field_{{$field->id}}_other">Other (please specify)</label>
    <input type="input" name="{{$field->name}}_other" class="form-control" id="field_{{$field->id}}_other" value="">
</div>

