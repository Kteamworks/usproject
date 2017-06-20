<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Http\Requests\PatientRequest;
use App\DrgProgress;
use App\DrgServices;
use App\HospitalService;
use App\Admission;
use Auth;

class PatientController extends Controller {

    /**
     * Create a new controller instance.
     * constructor to check
     * 1. authentication
     * 2. user roles
     * 3. roles must be user.
     *
     * @return void
     */
    public function __construct() {
        // checking authentication
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Patient $patient, PatientRequest $request) {
        $patient->fill($request->all())->save();
        $services = DrgServices::where('drg_id', '=', $request->input('drg_id'))->get();
        foreach ($services as $service) {
//            $hos_service = HospitalService::whereId($service->service_id)->first();
//            $cost = $hos_service->budget_cost;
            DrgProgress::create([
                'pid' => $request->input('pid'),
                'episode_id' => $request->input('episode_id'),
                'drg_id' => $request->input('drg_id'),
                'service_id' => $service->service_id,
                'units' => $service->units,
                'service_status' => 0,
                'authorized' => 0,
                'provider' => $service->provider
            ]);
        }
        return \Redirect::back()->with('success', 'Patient has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $patients = Patient::whereId($id)->first();
        return view('patients.patient_drg_progress', compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    public function updateProgress(DrgProgress $progresses, $id) {
        $progress = $progresses->whereId($id)->first();
        $progress->units = Input::get('units');
        $progress->actual_cost = Input::get('actual_cost');
        $progress->service_status = Input::get('service_status');
        if ($progress->service_status == 1) {
            $progress->service_date = \Carbon\Carbon::now();
        }
        $progress->authorized = Input::get('authorized');
        $progress->save();
        return redirect()->back()->with('success', 'Changes have been updated successfully!');
    }

    public function admissionDetails(Admission $admission, $id) {
        $patient_data = Patient::where('pid', '=', $id)->first();
        $admission->pid = $id;
        $admission->patient_episode_id = $patient_data->episode_id;
        $admission->patient_name = $patient_data->fname . $patient_data->lname;
        $admission->provider = Auth::user()->id;
        $admission->created_by = Auth::user()->id;
        $admission->admit_date = Input::get('admit_date').':00';
        $admission->discharge_date = Input::get('discharge_date').':00';
        $admission->save();
        return redirect()->back()->with('success', 'Data has been saved!');
    }

    public function admissionEdit(Admission $admission, $id) {
        $admission_data = $admission->where('pid', '=', $id)->first();
        $admission_data->discharged_by = Auth::user()->id;
        $admission_data->reason_for_discharge = Input::get('reason_for_discharge');
        $admission_data->actual_discharge_date = \Carbon\Carbon::now();
        $admission_data->save();
        return redirect()->back()->with('success', $admission_data->patient_name.' has been discharged!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
