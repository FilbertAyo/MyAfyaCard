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

   return view('dashboard',compact('patient','metrics'));

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
      Metric::create([
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
          'prognosis' => null,
        ]);

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
}
