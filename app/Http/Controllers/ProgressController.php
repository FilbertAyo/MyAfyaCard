<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   $patient = DB::table('patient_registers')->get();

   return view('dashboard',[
    'patient' => $patient,
   ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     
        $metrics = Patient::create([
          'cd'=> $request->cd,
          'weight'=>$request->weight,
          'viral_load'=> $request->viral_load, 
          'ratio'=>$request->ratio,
          'medicine'=>$request->medicine,
          'dosage'=>$request->dosage,
          'other_med'=>$request->other_med,
          'visit_date'=>$request->visit_date,
        ]);

        return redirect()->route('dashboard.show',$metrics->id)->with('success',"Metrics added successfully");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $patient= PatientRegister::findOrFail($id);
        $metrics = Patient::all();

        return view('layout.progress',compact('patient','metrics'));

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
        //
    }
}
