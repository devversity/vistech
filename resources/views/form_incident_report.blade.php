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
                'officers_name',
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
            <h4>Witness (1)</h4>
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
                'witness_date_1',
                'witness_statement_1_statement',
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
            <h4>Witness (2)</h4>
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
                'witness_date_2',
                'witness_statement_2_statement',
            ];
            ?>
            @foreach ($sections as $section)
                {!! $fields[$section] !!}
            @endforeach
        </div>
    </div>
</div>
@php
    $images = false;
@endphp
@for ($i=1; $i<6; $i++)
    @if(!empty($fields['form_image_' . $i]))
        @php
            $images = true;
        @endphp
    @endif
@endfor

@if($images === true)
<div class="card card-primary card-outline p-5">
    <div class="row">
        <div class="col-12">
            <h4>Image Uploads</h4>
            <hr/>
        </div>
    </div>
    <div class="row">
        @for ($i=1; $i<6; $i++)
            @if(!empty($fields['form_image_' . $i]))
                {!! $fields['form_image_' . $i] !!}
            @endif
        @endfor
    </div>
</div>
@endif

{!! isset($footer) ? $footer : null  !!}

@section('specific_scripts')

@endsection

@include('layouts.footer')


