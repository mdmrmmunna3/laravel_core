<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::get();
        return response()->json($doctors);
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
        $insertDoctor = new Doctor();
        $insertDoctor->name = $request->name;
        $insertDoctor->email = $request->email;
        $insertDoctor->phone = $request->phone;
        $insertDoctor->password = $request->password;
        $insertDoctor->speciality = $request->speciality;
        $insertDoctor->save();
        return response()->json($insertDoctor);
    }

    /**
     * Display the specified resource.
     */
    public function show($doctor_id)
    {
        $doctorData = Doctor::find($doctor_id);
        return response()->json($doctorData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedDoctor = Doctor::find($id);

        $updatedDoctor->name = $request->name;
        $updatedDoctor->email = $request->email;
        $updatedDoctor->phone = $request->phone;
        $updatedDoctor->speciality = $request->speciality;

        $updatedDoctor->save();
        return response()->json([
            'message' => 'Doctor updated successfully',
            'doctor' => $updatedDoctor,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($doctor_id)
    {
        $deleteDoctor = Doctor::where('id', $doctor_id)->delete();
        return response()->json($deleteDoctor);
    }
}
