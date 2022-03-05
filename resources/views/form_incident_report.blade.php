@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

{!! isset($header) ? $header : null  !!}

<div class="card card-primary card-outline p-5">
    <div class="row">
        <div class="col-12">
            <h4>Details of the incident</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <?php
            $sections = [
                'site_name',
                'site_sin',
                'date_of_incident',
                'type_of_incident',
                'details_of_incident',
                'actions_taken',
                'police_incident_number',
                'supervisor_mobile_images',
                'officers_surname',
                'officers_forename',
                'office_pin'
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
                'details_of_incident_continued'
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
                'people_informed'
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
                'security_officer_signature'
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
            <h4>Witness (1) details</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'witness_name_1',
                'witness_date_1',
                'witness_signature_1'
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
            <h4>Witness (2) details</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'witness_name_2',
                'witness_date_2',
                'witness_signature_2'
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
            <h4>Witness (1) statement</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'witness_statement_1_surname',
                'witness_statement_1_forename',
                'witness_statement_1_address',
                'witness_statement_1_postcode',
                'witness_statement_1_telephone',
                'witness_statement_1_statement',
                'witness_statement_1_signature',
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
            <h4>Witness (2) statement</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $sections = [
                'witness_statement_2_surname',
                'witness_statement_2_forename',
                'witness_statement_2_address',
                'witness_statement_2_postcode',
                'witness_statement_2_telephone',
                'witness_statement_2_statement',
                'witness_statement_2_signature',
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


