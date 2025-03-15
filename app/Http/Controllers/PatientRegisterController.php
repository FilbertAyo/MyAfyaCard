<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $microtime = microtime(true);

        $dateTime = new DateTime();
        $dateTime ->setTimestamp($microtime);

        $year = $dateTime->format('Y');
        $month = $dateTime->format('m');
        $day = $dateTime->format('d');
        $hour = $dateTime->format('H');
        $minute = $dateTime->format('i');
        $second = $dateTime->format('s');
        $millisecond = (int)($microtime*1000)%1000;

        $uniqueNo = $year.'-'.$month.'-'.$day.$hour.$minute.$second.str_pad($millisecond,3,'0',STR_PAD_LEFT);

        $uniqueNumber = substr($uniqueNo,0,16);

        $onlyTrashed = Patient::onlyTrashed()->count();
        $patient_register = Patient::withTrashed()->get();
        // $patient_register = Patient::all();
        $user = DB::table('users')->get();

        return view('layout.patient_register',compact('patient_register','user','onlyTrashed','uniqueNumber'));
    }

    public function inactive()
    {
        $patient_register = Patient::onlyTrashed()->get();

        $user = DB::table('users')->get();
       
        return view('layout.patient_inactive',compact('patient_register','user'));
    }

    public function active()
    {
        $patient_register = Patient::all();

        $user = DB::table('users')->get();
       
        return view('layout.patient_active',compact('patient_register','user'));
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
        $validatedData =  $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:40', // Ensure the name contains only alphabetic characters
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'phone_number' => [
                'required',
                'regex:/^0[67][0-9]{8}$/'
            ],
            'sup_contact' => [
                'required',
                'regex:/^0[67][0-9]{8}$/'
            ],
            'local_contact' => [
                'required',
                'regex:/^0[67][0-9]{8}$/'
            ],
            'street' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'district' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'city' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'confirmed' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'supporter' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'local_leader' => 'required|regex:/^[a-zA-Z\s]+$/|max:40',
            'reason' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'allergy' => 'required|regex:/^[a-zA-Z\s]+$/|max:140',
            'card_no' => 'required',
            'birth_date' => 'required|date|before:today', 
        ]);

        $allergy = $request->input('allergy') ?? 'None';


            Patient::create([
            'first_name' =>  $validatedData['first_name'],
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'card_no'=> $request->card_no,
            'gender'=> $request->gender,
            'birth_date' => $request->birth_date,
            'street'=> $request->street,
            'district'=> $request->district,
            'city' => $request->city,
            'country'=> $request->country,
            'allergy' => $allergy,
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
        $patient = Patient::findOrFail($id);
        $patient->delete();
    
        return redirect()->route('patient_register.index')->with('success',"Patient deactivated successfully");
      
    }
}
