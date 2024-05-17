<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Progress;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//    $patient = DB::table('patient_registers')->get();

   $metrics = Metric::with('patients')->get();
   $patient = Patient::with('metrics')->get();


   $pat = Patient::all();
   $goodPatient = Patient::where('mark','good')->count();
   $poorPatient = Patient::where('mark','poor')->count();
   $averagePatient = Patient::where('mark','satisfying')->count();
   $totalPatient = count($pat);
   
   session()->put('totalPatient',$totalPatient);
   session()->put('goodPatient',$goodPatient);
   session()->put('poorPatient',$poorPatient);
   session()->put('averagePatient',$averagePatient);


   return view('dashboard',compact('patient','metrics','totalPatient','goodPatient','poorPatient','averagePatient'));

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
      $metric =  Metric::create([
          'cd'=> $request->cd,
          'weight'=>$request->weight,
          'viral_load'=> $request->viral_load, 
          'ratio'=>$request->ratio,
          'medicine'=>$request->medicine,
          'dosage'=>$request->dosage,
          'other_med'=>$request->other_med,
          'visit_date'=>$request->visit_date,
          'patient_id'=>$request->patient_id,
          'enrolment' =>$request->enrolment,
          'prognosis' => $request->prognosis,
          'doctor' => $request->doctor,
          'doctor_contact' => $request->doctor_contact,
        ]);

        $patient = Patient::findOrFail($request->patient_id);
        if ($metric->cd < 250) {
            $patient->mark = 'poor';
            $patient->save();
        }
    
        elseif  ($metric->cd > 399){
            $patient->mark = 'good';
            $patient->save();
        }else{
            $patient->mark = 'satisfying';
            $patient->save();
        }
      

        return redirect()->back()->with('success',"Metrics added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $patient= Patient::findOrFail($id); 
        $metrics = Metric::where('patient_id',$id)->get();

        $cdData = Metric::where('patient_id',$id)
        ->select('created_at','cd')->get();
   
   
            $data = Metric::where('patient_id',$id)
            ->select('created_at','weight')->get();


            $ratio = Metric::where('patient_id',$id)
            ->select('created_at','ratio')->get();
       
            $formData = $cdData->map(function($item){
                return [
                    'x'=>Carbon::parse($item->created_at)->format('M/d'),
                    'y'=>$item->cd
                ];
                });

            $formattedData = $data->map(function($item){
                return [
                    'x'=>Carbon::parse($item->created_at)->format('M/d'),
                    'y'=>$item->weight
                ];
                });

                $ratioData = $ratio->map(function($item){
                    return [
                        'x'=>Carbon::parse($item->created_at)->format('M/d'),
                        'y'=>$item->ratio
                    ];
                    });

                    foreach ($metrics as $metric) {
                        // Check if quantity is below 20
                        if ($metric['cd']< 250) {
                            // Update status to 'low'
                            $metric->update(['prognosis'=>'dropping']);
                        } elseif($metric['cd']> 399) {
                            // Update status to 'enough'
                            $metric->update(['prognosis'=>'good']);
                        }else{
                            $metric->update(['prognosis'=>'average']);
                        }
                    }
                    
       
        return view('layout.progress',['cdData'=> $formData ,'data'=> $formattedData, 'ratio'=>$ratioData],compact('patient','metrics'));

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

    public function low(){

        $metrics = Metric::with('patients')->get();
        $patient = Patient::with('metrics')->get();
     

        return view('layout.poor_progress',compact('patient','metrics'));
    }
    public function good(){

        $metrics = Metric::with('patients')->get();
        $patient = Patient::with('metrics')->get();
     

        return view('layout.good_progress',compact('patient','metrics'));
    }
}
