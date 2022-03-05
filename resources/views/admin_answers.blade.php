@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

@if(isset($_GET['successful']))
<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            Your submission has been received, thank you.
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        @foreach ($headers as $header)
                            <th>{{ ucwords(str_replace("_", " ", $header)) }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>#{{$row->id}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>{{$row->form->name}}</td>
                            <td>{{$row->site}}</td>
                            <td>{{$row->submission_date}}</td>
                            <td>
                                <?php $emails = json_decode($row->emails); ?>
                                <ul>
                                @foreach ($emails as $email)
                                    @if (!empty($email))
                                        <li>{{$email}}</li>
                                    @endif
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="/form/view/{{$row->id}}">
                                    <button type="button" class="btn btn-info">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        View
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        @foreach ($headers as $header)
                            <th>{{ ucwords(str_replace("_", " ", $header)) }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@section('specific_scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme//plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('theme/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/jquery-validation/additional-methods.min.js') }}"></script>
@endsection

@include('layouts.footer')


