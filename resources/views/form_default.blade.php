@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')
<link id="bs-css" href="{{ asset('theme/datepicker/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
<link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-5">
                <form action="/insert/answers/{{$id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card card-primary card-outline p-5">
                    @foreach ($fields as $key => $field)
                        {!! $field !!}
                    @endforeach
                    </div>

                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <h4>Form Recipients</h4>
                                <p>Choose who will receive this form, you can choose from defaults below or enter a custom email address.</p>
                            </div>
                            <div class="col-12">
                                @if(!empty($emails))
                                    @foreach ($emails as $email)
                                        <br/>
                                        <input type="checkbox" id="field_{{$email->email}}" name="emails[]" value="{{$email->email}}">
                                        <label for="field_{{$email->email}}">{{$email->email}}</label>
                                    @endforeach
                                @endif
                                <div class="form-group">
                                    <label for="field_email_other"></label>
                                    <input type="input" name="email_other" class="form-control" id="field_email_other" value="">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-info" style="float:right">Submit Form</button>
            </div>
            </form>
        </div>
    </div>
</div>


@section('specific_scripts')

@endsection

@include('layouts.footer')


