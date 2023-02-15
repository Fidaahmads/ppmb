<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
        return view('presences.index', compact('students'));
    }
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'number'        => 'required|min:5',
            'name'          => 'required|min:5',
            'email'         => 'required|min:5',
            'phone'         => 'required|min:5',
            'photo'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $photo = $request->file('photo');
        $photo->storeAs('public/students', $photo->hashName());

        //create student
        Student::create([
            'number'         => $request->number,
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'photo'          => $photo->hashName(),
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    //
    public function edit(student $student)
    {
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, student $student)
    {
        //validate form
        $request->validate([
            'number'        => 'required|min:5',
            'name'          => 'required|min:5',
            'email'         => 'required|min:5',
            'phone'         => 'required|min:5',
            'photo'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if photo is uploaded
        if ($request->hasFile('photo')) {

            //upload new photo
            $photo = $request->file('photo');
            $photo->storeAs('public/students', $photo->hashName());

            //delete old photo
            Storage::delete('public/students/'.$student->photo);

            //update student with new photo
            $student->update([
             'number'         => $request->number,
             'name'           => $request->name,
             'email'          => $request->email,
             'phone'          => $request->phone,
             'photo'          => $photo->hashName(),
            ]);

        } else {

            //update student without photo
            $student->update([
            'number'         => $request->number,
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(student $student)
    {
        // delete photo
        Storage::delete('public/students/'. $student->photo);

        // delete student
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}