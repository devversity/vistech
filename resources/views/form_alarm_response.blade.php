@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

{!! isset($header) ? $header : null  !!}

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
            <h4>Did Emergency Service Attend Site?</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'police',
                'fire',
                'ambulance',
                'utilities',
                'boarding_up_services',
                'boarding_up_services',
                'emergency_services_log_number',
                'police_crime_number',
                'utility_service_called_out_number',
                'utility_service_log_number',
                'boarding_service_called',
                'boarding_service_log_number',
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
            <h4>Any Other Person/s On Site During Call Out?</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'number_of_person_on_site',
                'company_working_for',
                'contact_details',
            ];
            ?>
            @foreach ($sections as $section)
                {!! $fields[$section] !!}
            @endforeach
        </div>
    </div>
</div>

{!! isset($footer) ? $footer : null  !!}

@section('specific_scripts')

@endsection

@include('layouts.footer')


