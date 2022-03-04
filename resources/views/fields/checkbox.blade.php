<?php
$options = json_decode($field->options);
?>

<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    @if(!empty($options))
        @foreach ($options as $option)
            <br/>
            <input type="checkbox" id="field_{{$option}}" name="emails[]" value="{{$option}}">
            <label for="field_{{$option}}">{{$option}}</label>
        @endforeach
    @endif
</div>
