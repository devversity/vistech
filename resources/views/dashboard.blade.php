@section('title')
    VISTECH - Dashboard
@endsection

@include('layouts.header')

<pre>
User Login:
Users will have very limited access;
•         When the page is loaded it will require a login – this will accept any users from the “users” table in the database.
•         Once logged in the user will be given an option to select which form they want to use
•         Once a form has been selected a form will generate, this form will load all the fields from that form
•         Once the form is entered and submit is pressed the data will be stored in the “answers” table.
YES
•         Alongside the data being placed into a database the form will generate an e-mail which will be assigned to that form with the option to manually enter an email
Admin Login:
Admins will have a dashboard allowing them to do the following:
•         Add/Remove other administrators
•         Add/Remove Users
•         View all form Entries/Answers with filters such as “site/user/date”

ALSO IDEALLY HAVE GEOLOCATION AND DATE TIME STAMP FROM WHERE THEY ARE
</pre>

@include('layouts.footer')


