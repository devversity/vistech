<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Email;
use App\Models\Form;

/**
 * Vistech controller
 */
class VistechController extends Controller
{
    /**
     * List of valid endpoints for this controller
     *
     * @var array
     */
    private $endPoints = [
        'administrators',
        'users',
        'forms',
        'form_submissions',
        'answers',
        'emails'
    ];

    public function __construct()
    {

    }

    /**
     * The Vistech dasboard
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $forms = Form::where('active', '=', 1)->get();

        return view('dashboard', [
            'user' => Auth::user(),
            'forms' => $forms
        ]);
    }

    /**
     * Deals with admin requests
     *
     * @param string $type
     */
    public function admin(string $type)
    {
        $user = Auth::user();

        // Access restrictions
        if (
            $user->permission_id !== 1 ||
            !in_array($type, $this->endPoints)
        ) {
            return redirect("/");
        }

        $data = null;
        $headers = null;

        switch ($type) {
            case "administrators":
                $headers = [
                    'id',
                    'name',
                    'email',
                    'status'
                ];
                $data = User::where('active', '=', 1)->where('permission_id', '=', 1)->get();

                break;
            case "users":
                $headers = [
                    'id',
                    'name',
                    'email',
                    'status'
                ];
                $data = User::where('active', '=', 1)->where('permission_id', '=', 2)->get();

                break;
            case "answers":
                break;
            case "emails":
                $headers = [
                    'id',
                    'name',
                    'email',
                    'status'
                ];
                $data = Email::where('active', '=', 1)->get();
                break;
        }

        // View
        return view('admin_' . $type, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $type)),
            'link' => url()->current(),
            'data' => $data,
            'headers' => $headers,
            'type' => $type
        ]);
    }

    /**
     * Deals with user requests
     *
     * @param string $type
     */
    public function user(string $type)
    {
        // Access restrictions
        if (!in_array($type, $this->endPoints)) {
            return redirect("/");
        }

        $data = null;
        $headers = null;
        $emails = null;

        switch ($type) {
            case "forms":

                $headers = [
                    'id',
                    'name'
                ];

                $data = Form::with('fields')
                    ->where('active', '=', 1)
                    ->get();

                break;
            case "form_submissions":
                break;
        }

        // View
        return view('user_' . $type, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $type)),
            'link' => url()->current(),
            'data' => $data,
            'headers' => $headers,
            'type' => $type
        ]);
    }


    /**
     * Delete a record
     *
     * @param string $type
     * @param int $id
     */
    public function delete(Request $request, string $type, int $id)
    {
        dd($type, $id, $request->post(), $request->query());
    }

    /**
     * Edit a record
     *
     * @param string $type
     * @param int $id
     */
    public function edit(Request $request, string $type, int $id)
    {
        dd($type, $id, $request->post(), $request->query());
    }

    /**
     * Insert a record
     *
     * @param string $type
     */
    public function insert(Request $request, string $type, int $id = 0)
    {
        dd($type, $id, $request->post(), $request->query(), $_FILES, $request->file('vistech_id_badge'));


//        $file = $request->file('photo');
//
//        //File Name
//        $file->getClientOriginalName();
//
//        //Display File Extension
//        $file->getClientOriginalExtension();
//
//        //Display File Real Path
//        $file->getRealPath();
//
//        //Display File Size
//        $file->getSize();
//
//        //Display File Mime Type
//        $file->getMimeType();
//
//        //Move Uploaded File
//        $destinationPath = 'uploads';
//        $file->move($destinationPath,$file->getClientOriginalName());
    }

    /**
     * Submit a form
     *
     * @param int $id
     */
    public function form(int $id)
    {
        $data = Form::with('fields', 'fields.type')
            ->where('id', '=', $id)
            ->first();

        $view = 'form_default';
        if (!empty($data->view)) {
            $view = 'form_' . $data->view;
        }

        // Create a collection keyed by field name
        $fields = Form::fieldHtml($data);

        $emails = Email::where('active', '=', 1)
            ->get();

        // View
        return view($view, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $data->name)),
            'link' => url()->current(),
            'fields' => $fields,
            'data' => $data,
            'id' => $id,
            'emails' => $emails
        ]);
    }

    /**
     * Redirect to the right form
     *
     * @param Request $request
     */
    public function redirect(Request $request)
    {
        return redirect("/form/submit/" . $request->post('id'));
    }

}
