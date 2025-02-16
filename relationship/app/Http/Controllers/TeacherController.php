<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function loadAllTeachers()
    {
        $allTeachers = Teacher::all();
        // return $allTeachers;
        return view('teachers', compact('allTeachers'));
    }

    // view a add teacher form 

    public function loadTeacherForm()
    {
        return view('add_teacher');
    }

    // insert teacher info and send to database
    public function addTeacher(Request $request)
    {
        // formula one 
        /* $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
        ]);
        Teacher::create($request->all());
        return redirect('/teachers')->with('status', 'Teacher Create Successfully!'); */

        // formula two to insert data to the database 
        $teacherData = new Teacher();
        $teacherData->name = $request->name;
        $teacherData->age = $request->age;
        $teacherData->phone_number = $request->phone_number;
        $teacherData->speciality = $request->speciality;

        $teacherData->save();

        return redirect('/teachers')->with('success', 'Teacher Create Successfully!');
    }

    // destroy/delete teacher 
    public function deleteTeacher($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect('/teachers')->with('success', 'Teacher Delete Successfully!');
    }

    // loadTeacher edit form 
    public function loadEditTeacherForm($id)
    {
        $teacher = Teacher::find($id);
        return view('edit_teacher', compact('teacher'));
    }
    // edit teacher info 
    public function editTeacher(Request $request)
    {
        Teacher::where('id', $request->id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'speciality' => $request->speciality
        ]);
        return redirect('/teachers')->with('success', 'Teacher Update Successfully!');
    }
}
