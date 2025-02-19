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
        $insertDoctor->spciality = $request->spciality;
        $insertDoctor->save();
        return response()->json($insertDoctor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
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
