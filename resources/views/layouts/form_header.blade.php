
<link id="bs-css" href="{{ asset('theme/datepicker/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
<link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

@if(!empty($answers))

<?php
    $emails = [];
    if (!empty($answers->emails)) {
        $emails = collect(json_decode($answers->emails))->toArray();
        $emails = implode(", ", $emails);
    }

?>

<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Submission Log</h5>
            Form was submitted {{ $answers->submission_date }} by <strong>{{$answers->user->name}}</strong> and sent to <strong>{{$emails}}</strong>.
            <br/>To re-send emails, click <a href="/email_submission/{{$answers->id}}?redirect={{URL::current()}}">here</a>.
        </div>
        </div>
    </div>
</div>

@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-5">
                @if($mode !== 'view')
                <form action="/insert/answers/{{$id}}?redirect=/user/form_submissions/" enctype="multipart/form-data" method="post">
                    @csrf
                @endif
