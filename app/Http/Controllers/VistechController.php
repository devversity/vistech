<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        return view('dashboard', [
            'user' => Auth::user(),
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

        // View
        return view('admin_' . $type, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $type)),
            'link' => url()->current()
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

        // View
        return view('user_' . $type, [
            'user' => Auth::user(),
            'title' => ucwords(str_replace("_", " ", $type)),
            'link' => url()->current()
        ]);
    }

}
