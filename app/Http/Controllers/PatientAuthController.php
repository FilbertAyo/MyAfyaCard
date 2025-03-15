<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PatientAuthController extends Controller
{
    public function index()
    {
        return view('auth.patient_login');
    }

    public function pat_login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'card_no' => 'required',
        ]);

        // $credentials = $request->only('phone_number', 'card_no');
        $patient = Patient::where('phone_number',$request->phone_number)->where('card_no',$request->card_no)->first();

        if ($patient) {
            Auth::guard('patients')->login($patient);
            return view('patient', compact('patient'));
        } else {
            return back()->with('fail','Invalid patient credentials');
        }
    }

    public function showPatientDashboard()
    {
        $patient = Auth::guard('patients')->user();
        return view('patient', ['card_no' => $patient->card_no]);
    }
}
