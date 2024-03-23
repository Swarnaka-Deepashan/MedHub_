<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    //show
    public function show(string $id)
    {
        // var_dump($id);
        // die;
        return view('prescriptionsShow')->with('prescription', Prescription::find($id));

    }

    //index
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('prescriptionsIndex')->with('prescriptions', $prescriptions);
    }

    public function create()
    {
        // Return a view with the prescription upload form
        return view('prescriptions');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Limit each image to 2MB
            'note' => 'nullable|string',
            'delivery_address' => 'required|string|max:255',
        ]);

        //Process and Store Images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store the image and get the path
                $path = $image->store('prescriptions', 'public'); // 'prescriptions' is a directory inside 'storage/app/public'
                $imagePaths[] = $path;
            }
        }

        // Store Data in the Database
        $prescription = new Prescription([
            'user_id' => auth()->id(), // Assuming you have authentication and the users are logged in
            'image_paths' => json_encode($imagePaths), // Convert the paths array to a JSON string
            'note' => $validatedData['note'],
            'delivery_address' => $validatedData['delivery_address'],
        ]);

        $prescription->save(); // This line is what actually saves the model to the database.

        // Redirect the user...
        return redirect()->route('home')->with('success', 'Prescription uploaded successfully.');
    }
}
