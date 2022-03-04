@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-5">
                <form action="/insert/answers/{{$id}}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'date_of_call_out',
                                    'site_called_out_to',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'time_of_call_out',
                                    'time_on_site',
                                    'time_left_site',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'reason_for_call_out',
                                    'called_out_by',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <h4>Attending Officer</h4>
                                <hr/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'attending_officers_name',
                                    'attending_officers_sia_number',
                                    'attending_officers_signature',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'key_pouch_seal_no_broken',
                                    'new_key_pouch_seal_no_fitted',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'what_was_observed',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline p-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sections = [
                                    'actions_taken',
                                ];
                                ?>
                                @foreach ($sections as $section)
                                    {!! $fields[$section] !!}
                                @endforeach
                            </div>
                        </div>
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


