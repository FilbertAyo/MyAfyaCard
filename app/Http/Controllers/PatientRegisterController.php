<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient_register = Patient::all();

        return view('layout.patient_register',compact('patient_register'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.patient_register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData= $request->all();

        Patient::create($requestData);

        return redirect()->back()->with('success',"Registration done successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->get();
        $currentTime = Carbon::now();


        $patient_register = Patient::findOrFail($id);

        return view('layout.patient_details',[
            'user' => $user,
            'currentTime'=> $currentTime,

        ],compact('patient_register','user','currentTime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient_register= Patient::findOrFail($id);

        $patient_register->delete();

        return redirect()->route('patient_register.index')->with('success',"Patient deleted successfully");

    }
}
