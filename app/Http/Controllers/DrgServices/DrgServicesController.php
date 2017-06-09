<?php

namespace App\Http\Controllers\DrgServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DrgServicesRequest;
use App\DrgServices;
use Auth;
use Input;

class DrgServicesController extends Controller
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
      return view('drg_services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrgServicesRequest $request, DrgServices $drg_services)
    {
        $drg = Input::get('drg');
        $drg_name = \App\Drg::where('id',$drg)->first();
        $service = Input::get('service');
        $drg_services->drg_id = $drg;
        $drg_services->service_id = $service;    
        $drg_services->units = $request->input('units');
        $drg_services->provider = $request->input('provider');
        $drg_services->created_by = Auth::user()->id;    
        $drg_services->save();
        return redirect()->back()->with('success','A service under '.$drg_name->title.' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DrgServicesRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
        public function getDelete($id)
    {
            return redirect()->back()->with('fails','Cannot delete a service registered by the patient');
//            DrgServices::whereId($id)->delete();
    }
}
