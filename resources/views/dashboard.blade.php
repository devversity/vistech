@section('title')
    VISTECH - Dashboard
@endsection

@include('layouts.header')

@if ($user->permission_id === 1)
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline p-4">
                <h5>Phase One (March 2022):</h5>

                <h6><strong>User Login:</strong></h6>
                <p>Users will have very limited access;</p>
                <ul>
                    <li>When the page is loaded it will require a login – this will accept any users from the “users”
                        table in the database.
                    </li>
                    <li>Once logged in the user will be given an option to select which form they want to use.</li>
                    <li>Once a form has been selected a form will generate, this form will load all the fields from that
                        form.
                    </li>
                    <li>Once the form is entered and submit is pressed the data will be stored in the “answers” table.
                    </li>
                    <li>Alongside the data being placed into a database the form will generate an e-mail which will be
                        assigned to that form with the option to manually enter an email
                    </li>
                </ul>
                <h6><strong>Admin Login:</strong></h6>
                <p>Admins will have a dashboard allowing them to do the following:</p>
                <ul>
                    <li>Add/Remove other administrators.</li>
                    <li>Add/Remove Users.</li>
                    <li>View all form Entries/Answers with filters such as “site/user/date”.</li>
                </ul>
            </div>
        </div>
    </div>
@endif

@include('layouts.footer')


