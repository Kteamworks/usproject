<?php

namespace App\Http\Controllers\Drg;

use Illuminate\Http\Request;

class DrgProgressController extends Controller
{
            /**
     * Create a new controller instance.
     * constructor to check
     * 1. authentication
     * 2. user roles
     * 3. roles must be user.
     *
     * @return void
     */
    public function __construct()
    {
        // checking authentication
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drgs.index');
    }

}
