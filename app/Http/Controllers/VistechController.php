<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

/**
 * Vistech controller
 */
class VistechController extends Controller
{

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
            'user' => Auth::user()
        ]);

        dd('Logged In!');
    }

}
