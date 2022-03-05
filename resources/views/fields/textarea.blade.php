<div class="form-group">
    <label>{{ $field->nice_name }}</label>
    <textarea name="{{$field->name}}" class="form-control" rows="3" placeholder="Enter ..." {{$disabled ? 'disabled' : ''}}>{{isset($value) ? $value : $field->default}}</textarea>
</div>
