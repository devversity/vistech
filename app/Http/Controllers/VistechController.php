<?php

namespace App\Http\Controllers;

use App\Mail\NewEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Email;
use App\Models\Form;
use App\Models\Answer;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

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

    private $from = 'noreply@vistech.co.uk';

    public function __construct()
    {
        $this->destinationPath = 'uploads/';
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
     * Email submission
     *
     * @param Request $request
     * @param int $answerId
     * @param int $render
     */
    public function email_submission(Request $request, int $answerId, int $render = 0)
    {
        // Get answer
        $answers = Answer::with('user', 'form', 'form.fields')
            ->where('id', '=', $answerId)
            ->first();

        // Get form data
        $formData = collect(json_decode($answers->form_data))->toArray();

        // Introduction text
        $intro = 'A form submission has been sent by ' . $answers->user->name;

        // Email URL
        $url = url('/');

        // Template
        $template = 'new_submission';

        // Subject
        $subject = 'New Form Submission Sent By ' . $answers->user->name;

        // From
        $from = $this->from;

        // Get emails
        $emails = isset($formData['emails']) ?  $formData['emails'] : [];
        $emailsOther = explode(",", isset($formData['email_other']) ? $formData['email_other'] : '');
        $emails = array_merge($emails, $emailsOther);

        // Remove certain fields
        unset($formData['_token']);
        unset($formData['emails']);
        unset($formData['email_other']);

        foreach ($emails as $recipient) {
            $mailData = [
                'intro' => $intro,
                'subject' => $subject,
                'from' => $from,
                'data' => $formData,
                'url' => url($url),
                'template' => $template
            ];

            $mail = new NewEmail($recipient, $mailData);
            $mail->send();
        }

        // Otherwise, redirect
        return redirect($request->query('redirect', '/') . '?emailed=Y');
    }

    public function test_email()
    {
        $user = Auth::user();

        foreach (['stuarttodd444@gmail.com'] as $recipient) {

            $mailData = [
                'intro' => 'Your new Administrator account has been created',
                'fields' => [
                    'name' => 'Stuart Todd',
                    'email' => 'stuart444@gmail.com',
                    'password' => 'Stu',
                ],
                'url' => url('/')
            ];

            $mail = new NewEmail($mailData);
            return $mail->render();
        }
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
                $data = User::where('permission_id', '=', 1)->get();

                break;
            case "users":
                $headers = [
                    'id',
                    'name',
                    'email',
                    'status'
                ];
                $data = User::where('permission_id', '=', 2)->get();

                break;
            case "answers":
                $headers = [
                    'id',
                    'user',
                    'form',
                    'site',
                    'submission_date',
                    'recipients',
                ];
                $data = Answer::with('user', 'form')->get();

                break;
            case "emails":
                $headers = [
                    'id',
                    'name',
                    'email',
                    'status'
                ];
                $data = Email::all();
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
        $user = Auth::user();

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

                $headers = [
                    'id',
                    'user',
                    'form',
                    'site',
                    'submission_date',
                    'recipients',
                ];


                if ($user->permission_id === 1) {
                    $data = Answer::with('user', 'form')
                        ->get();
                } else {
                    $data = Answer::with('user', 'form')
                        ->where('user_id', '=', $user->id)
                        ->get();
                }

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
        switch ($type) {
            case "administrators":
            case "users":
                User::find($id)->delete();
                break;
            case "emails":
                Email::find($id)->delete();
                break;
            default:
                dd($type, $id);
                break;
        }

        return redirect($request->query('redirect', '/') . '?deleted=Y');
    }

    /**
     * Edit a record
     *
     * @param string $type
     * @param int $id
     */
    public function edit(Request $request, string $type, int $id)
    {
        // List of files submitted
        $files = [];
        if (!empty($_FILES)) {
            foreach ($_FILES as $key => $file) {
                if (!empty($file['tmp_name'])) {
                    $fileName = time() . '_' . $file['name'];
                    $files[$key] = $this->destinationPath . $fileName;
                    move_uploaded_file($file['tmp_name'], public_path($this->destinationPath) . $fileName);
                }
            }
        }

        // Set formData
        $formData = array_merge($request->post(), $files);

        switch ($type) {
            case "administrators":
            case "users":

                $user = User::find($id);

                if (isset($formData['name'])) {
                    $user->name = $formData['name'];
                }
                if (isset($formData['email'])) {
                    $user->email = $formData['email'];
                }
                if (isset($formData['active'])) {
                    $user->active = $formData['active'];
                }
                if (!empty($formData['password'])) {
                    $user->password = Hash::make($formData['password']);
                }

                $user->save();
                break;
            case "emails":
                $email = Email::find($id);

                if (isset($formData['name'])) {
                    $email->name = $formData['name'];
                }
                if (isset($formData['email'])) {
                    $email->email = $formData['email'];
                }
                if (isset($formData['active'])) {
                    $email->active = $formData['active'];
                }

                $email->save();
                break;

            default:

                dd($type, $formData);
                break;
        }

        return redirect($request->query('redirect', '/') . '?updated=Y');
    }

    /**
     * Insert a record
     *
     * @param string $type
     * @param int $id
     */
    public function insert(Request $request, string $type, int $id = 0)
    {
        // Set user
        $user = Auth::user();

        // Send email or not
        $sendEmail = false;
        $template = null;
        $intro = null;
        $subject = null;

        // List of files submitted
        $files = [];
        if (!empty($_FILES)) {
            foreach ($_FILES as $key => $file) {
                if (!empty($file['tmp_name'])) {
                    $fileName = time() . '_' . $file['name'];
                    $files[$key] = [
                        'filename' => $this->destinationPath . $fileName
                    ];
                    move_uploaded_file($file['tmp_name'], public_path($this->destinationPath) . $fileName);
                }
            }
        }

        // Get emails
        $emails = $request->post('emails', []);
        $emailsOther = explode(",", $request->post('email_other', ''));
        $emails = array_merge($emails, $emailsOther);

        // Set formData
        $formData = array_merge($request->post(), $files);

        // Remove certain fields
        unset($formData['_token']);
        unset($formData['emails']);
        unset($formData['email_other']);


        switch ($type) {
            case "users":
                $user = new User;

                $user->permission_id = 2;

                if (isset($formData['name'])) {
                    $user->name = $formData['name'];
                }
                if (isset($formData['email'])) {
                    $user->email = $formData['email'];
                }
                if (isset($formData['active'])) {
                    $user->active = $formData['active'];
                }
                if (!empty($formData['password'])) {
                    $user->password = Hash::make($formData['password']);
                }

                $user->save();

                unset($formData['active']);

                // Send user email
                $sendEmail = true;
                $emails = [$formData['email']];
                $template = 'new_user';
                $intro = 'A user account was set up for you, details below:';
                $subject = 'Your New User Account';

                break;
            case "administrators":
                $user = new User;

                $user->permission_id = 1;

                if (isset($formData['name'])) {
                    $user->name = $formData['name'];
                }
                if (isset($formData['email'])) {
                    $user->email = $formData['email'];
                }
                if (isset($formData['active'])) {
                    $user->active = $formData['active'];
                }
                if (!empty($formData['password'])) {
                    $user->password = Hash::make($formData['password']);
                }

                unset($formData['active']);

                // Send user email
                $sendEmail = true;
                $emails = [$formData['email']];
                $template = 'new_user';
                $intro = 'An administrator account was set up for you, details below:';
                $subject = 'Your New Administrator Account';

                $user->save();
                break;
            case "emails":
                $email = new Email;

                if (isset($formData['name'])) {
                    $email->name = $formData['name'];
                }
                if (isset($formData['email'])) {
                    $email->email = $formData['email'];
                }
                if (isset($formData['active'])) {
                    $email->active = $formData['active'];
                }

                $email->save();
                break;
            case "answers":

                // Log answer
                $answer = new Answer;
                $answer->user_id = $user->id;
                $answer->form_id = $id;
                $answer->submission_date = Carbon::now()->toDate();
                $answer->site = ''; // For later.
                $answer->form_data = json_encode($formData);
                $answer->emails = json_encode($emails);

                $answer->save();

                // Send email (if applicable)
                $sendEmail = true;
                $template = 'new_submission';
                $intro = 'A form submission has been sent by ' . $user->name;
                $subject = 'New Form Submission Sent By ' . $user->name;

                break;
            default:

                dd($type, $formData);
                break;
        }

        if (
            $sendEmail === true &&
            !empty($emails)
        ) {
            $url = url('/');
            $from = $this->from;

            foreach ($emails as $recipient) {
                $mailData = [
                    'intro' => $intro,
                    'subject' => $subject,
                    'from' => $from,
                    'data' => $formData,
                    'url' => url($url),
                    'template' => $template
                ];

                $mail = new NewEmail($recipient, $mailData);
                $mail->send();
            }
        }

        return redirect($request->query('redirect', '/') . '?updated=Y');
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
        $header = view('layouts.form_header', [
            'mode' => 'insert',
            'answers' => null,
            'id' => $data->id,
        ]);
        $footer = view('layouts.form_footer', [
            'mode' => 'insert',
            'id' => $data->id,
            'emails' => $emails,
        ]);

        return view($view, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $data->name)),
            'link' => url()->current(),
            'fields' => $fields,
            'data' => $data,
            'id' => $data->id,
            'answers' => null,
            'header' => $header,
            'footer' => $footer
        ]);
    }

    /**
     * View form
     *
     * @param Request $request
     * @param int $id
     */
    public function view(Request $request, int $id)
    {
        $answers = Answer::findOrFail($id);
        $emails = Email::where('active', '=', 1)->get();
        $formData = collect(json_decode($answers->form_data))->toArray();

        $data = Form::with('fields')
            ->where('id', '=', $answers->form_id)
            ->first();

        $view = 'form_default';
        if (!empty($data->view)) {
            $view = 'form_' . $data->view;
        }

        // Create a collection keyed by field name
        $fields = Form::fieldHtml($data, $formData, true);

        // View
        $header = view('layouts.form_header', [
            'mode' => 'view',
            'answers' => $answers,
            'id' => $data->id,
        ]);
        $footer = view('layouts.form_footer', [
            'mode' => 'view',
            'id' => $data->id,
            'emails' => $emails,
        ]);

        return view($view, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $data->name)),
            'link' => url()->current(),
            'fields' => $fields,
            'data' => $data,
            'id' => $data->id,
            'answers' => $answers,
            'header' => $header,
            'footer' => $footer
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
