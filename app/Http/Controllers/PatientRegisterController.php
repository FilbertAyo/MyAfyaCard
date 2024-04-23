<?php

namespace App\Http\Controllers;

use App\Models\PatientRegister;
use Illuminate\Http\Request;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient_register = PatientRegister::all();

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

        PatientRegister::create($requestData);

        return redirect()->back()->with('success',"Registration done successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $patient_register= PatientRegister::findOrFail($id);

        $patient_register->delete();

        return redirect()->route('patient_register.index')->with('success',"Patient deleted successfully");

    }
}
