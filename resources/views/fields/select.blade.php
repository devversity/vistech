<?php
$options = json_decode($field->options);
?>

<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    <select name="{{$field->name}}" class="form-control" {{ $disabled ? 'disabled' : '' }}>
        <option value="">Please choose...</option>
        @if(!empty($options))
            @foreach ($options as $option)
                <option {{ !empty($value) && $value === $option ? 'selected="selected"' : '' }} value="{{$option}}">{{$option}}</option>
            @endforeach
        @endif
    </select>
</div>
