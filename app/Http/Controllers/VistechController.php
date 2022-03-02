<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd('Logged In!');
    }

}
