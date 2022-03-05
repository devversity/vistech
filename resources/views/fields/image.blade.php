<div class="form-group">
    <label for="field_{{$field->id}}">{{ $field->nice_name }}</label>
    @if($disabled === false)
    <input type="file" id="field_{{$field->id}}" name="{{ $field->name }}">
    @endif

    @if(!empty($value->filename))
        <br/>
        <img src="{{ asset($value->filename) }}" title="{{ $field->name }}" style="max-width:500px;"/>
    @endif
</div>

{{--@dd($value->filename)--}}
