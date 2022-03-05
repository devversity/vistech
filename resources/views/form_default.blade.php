@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

{!! isset($header) ? $header : null  !!}

<div class="card card-primary card-outline p-5">
@foreach ($fields as $key => $field)
    {!! $field !!}
@endforeach
</div>

{!! isset($footer) ? $footer : null  !!}

@section('specific_scripts')

@endsection

@include('layouts.footer')


