<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Models\Quotation;
use App\Models\Prescription;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
   

    public function index()
    {
        // Assuming there's a 'prescription' relationship set up on the Quotation model that links to a Prescription model
        $quotations = Quotation::whereHas('prescription', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('quotationsIndex', compact('quotations'));
    }



    

    public function acceptAll(Request $request)
    {
        // ... quotation accept logic ...

        ActionLog::create([
            'user_id' => auth()->id(),
            'action' => 'accepted',
            'description' => 'User accepted all quotations.'
        ]);

        // return back()->with('success', 'Feedback Sent : Accepted.');
        return redirect()->route('home')->with('success', 'Feedback Sent: Accepted.');
    }

    public function rejectAll(Request $request)
    {
        // ... quotation reject logic ...

        ActionLog::create([
            'user_id' => auth()->id(),
            'action' => 'rejected',
            'description' => 'Feedback Sent : rejected'
        ]);

        return redirect()->route('home')->with('success', 'Feedback Sent: Rejected.');
    }






    public function create($prescriptionId)
    {

        


        // Fetch all prescriptions
        $prescriptions = Prescription::all();

       

        // Pass the prescription data to the view
        return view('quotations', compact('prescriptions'));
    }





    //store function

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([

            'drug' => 'required|string',
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'prescription_id' => 'numeric'
        ]);

        // Create and save the quotation to the database
        $quotation = Quotation::create($validatedData);

        return back()->with('success', 'Drug added successfully. Add more drugs or finish');






    }
}
