@section('title')
    VISTECH - {{ $title }}
@endsection

@include('layouts.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <p>A list of emails is available whenever a form is submitted. These emails will receive the form data.</p>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#insert-modal">
                            Add new
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="insert-modal">
                    <div class="modal-dialog">
                        <div class="modal-content bg-primary">
                            <div class="modal-header">
                                <h4 class="modal-title">Insert a new record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="/insert/{{ $type }}?redirect={{ url()->current() }}'" method="post"
                                  id="insert">
                                @csrf
                                <div class="modal-body">
                                    <div id="errors-new"></div>
                                    <label for="name-new">Name</label>
                                    <input type="text" name="name" class="form-control" id="name-new"
                                           placeholder="Enter name" value="">
                                    <br/>
                                    <label for="email-new">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email-new"
                                           placeholder="Enter email" value="">
                                    <br/>
                                    <label for="active-new">Status</label>
                                    <select name="active" class="form-control" id="active-new">
                                        <option value="0">Disabled</option>
                                        <option value="1">Enabled</option>
                                    </select>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-outline-light"
                                            onclick="return validateForm('insert', '-new')">Insert record
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                @if ($row->active === 1)
                                    <button type="button" class="btn btn-success">Enabled</button>
                                @else
                                    <button type="button" class="btn btn-danger">Disabled</button>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#modal-edit-{{$row->id}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-delete-{{$row->id}}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>

                                <div class="modal fade" id="modal-edit-{{$row->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-info">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit record</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form
                                                action="/edit/{{ $type }}/{{$row->id}}?redirect={{ url()->current() }}'"
                                                method="post" id="edit-{{$row->id}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div id="errors-{{$row->id}}"></div>
                                                    <label for="name-{{$row->id}}">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                           id="name-{{$row->id}}" placeholder="Enter name"
                                                           value="{{$row->name}}">
                                                    <br/>
                                                    <label for="email-{{$row->id}}">Email address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           id="email-{{$row->id}}" placeholder="Enter email"
                                                           value="{{$row->email}}">
                                                    <br/>
                                                    <label for="active-{{$row->id}}">Status</label>
                                                    <select name="active" class="form-control">
                                                        <option value="0" {{ $row->active === 0 ? 'selected' : '' }}>
                                                            Disabled
                                                        </option>
                                                        <option value="1" {{ $row->active === 1 ? 'selected' : '' }}>
                                                            Enabled
                                                        </option>
                                                    </select>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" class="btn btn-outline-light"
                                                            onclick="return validateForm('edit-{{$row->id}}', '-{{$row->id}}')">
                                                        Save changes
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-delete-{{$row->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Warning!</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you'd like to delete this record? This change cannot be
                                                    rolled back.</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-outline-light"
                                                        onclick="location.href='/delete/{{ $type }}/{{$row->id}}?redirect={{ url()->current() }}'">
                                                    Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

@endsection

@include('layouts.footer')
