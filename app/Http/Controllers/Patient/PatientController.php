<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index');
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
    public function store()
    {
    $fname = Input::get('fname');
    $sex = Input::get('sex');
        $drivers_license = Input::get('drivers_license');
            $blood_group = Input::get('blood_group');
                $age = Input::get('age');
                $postal_code = Input::get('postal_code');
                $state = Input::get('state');
                $DOB = Input::get('DOB');
                $status = Input::get('status');
$phone_cell = Input::get('phone_cell');
$country_code = Input::get('country_code');
$city = Input::get('city');
$street = Input::get('street');
$email = Input::get('email');
$visittype = Input::get('visittype');
                \DB::table('patient_data')->insert(['fname' => $fname, 'sex' => $sex,'drivers_license' => $drivers_license, 'blood_group' => $blood_group, 'age' => $age, 'postal_code' => $postal_code,'state' => $state,'DOB' => $DOB,'status' => $status,'phone_cell'=>$phone_cell,'country_code'=>$country_code,'city'=>$city,'street'=>$street,'email'=>$email,'visittype'=>$visittype]);
    
                return \Redirect::back()->with('success','Patient has been created');
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
    public function update(Request $request, $id)
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
}
