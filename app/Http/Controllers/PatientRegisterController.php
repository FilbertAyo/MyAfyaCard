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
        $user = DB::table('users')->get();

        return view('layout.patient_register',compact('patient_register','user'));
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
        // $requestData= $request->all();

        // Patient::create($requestData);

       $patient =  Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'patient_email'=> $request->patient_email,
            'gender'=> $request->gender,
            'birth_date' => $request->birth_date,
            'street'=> $request->street,
            'district'=> $request->district,
            'city' => $request->city,
            'country'=> $request->country,
            'allergy' => $request->allergy,
            'family_exposure'=> $request->family_exposure,
            'confirmed'=> $request->confirmed,
            'co_year' => $request->co_year,
            'partner'=> $request->partner,
            'supporter' => $request->supporter,
            'relation'=> $request->relation,
            'sup_address'=> $request->sup_address,
            'sup_contact' => $request->sup_contact,
            'local_leader'=> $request->local_leader,
            'local_contact' => $request->local_contact,
            'mark'=> $request->mark,
            'stage'=> $request->stage,
            'reason'=> $request->reason,
            'user_id'=> $request->user_id,
           
        ]);

        // if ($request->has('allergy') && $request->has('patient_email') && $request->has('supporter') && $request->has('sup_address') && $request->has('sup_contact') )  {         
        //     $patient->allergy = $request->allergy;
        //     $patient->patient_email = $request->patient_email;
        //     $patient->supporter = $request->supporter;
        //     $patient->sup_address = $request->sup_address;
        //     $patient->sup_contact = $request->sup_contact;
        //     $patient->save();           
        // }
    

        return redirect()->back()->with('success',"Registration done successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = DB::table('users')->get();
        // $currentTime = Carbon::now();

      
        $patient = Patient::with('user')->get();
      


        $patient_register = Patient::findOrFail($id);
        $user = User::with('patients')->get();

        return view('layout.patient_details',[
            // 'user' => $user,
            // 'currentTime'=> $currentTime,

        ],compact('patient_register','user','patient'));
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
