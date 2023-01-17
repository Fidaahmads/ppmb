<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{   
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate( [
            'number'     => 'required|min:5',
            'name'   => 'required|min:10',
            'email'   => 'required|min:10',
            'phone'   => 'required|min:10',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/students', $image->hashName());

        //create post
        Student ::create([
            'number'     => $request->number,
            'name'     => $request->name,
            'email'   => $request->email,
            'phone'     => $request->phone,
            'photo'     => $image->hashName()
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Student $post)
    {
        return view('students.edit', compact('students'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Student $post)
    {
        //validate form
        $request->validate( [
            'number'  => 'required|min:5',
            'name'    => 'required|min:5',
            'email'   => 'required|min:10',
            'phone'   => 'required|min:10',
            'photo'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //check if image is uploaded
        if ($request->hasFile('photo')) {

            //upload new image
            $image = $request->file('photo');
            $image->storeAs('public/students', $image->hashName());

            //delete old image
            Storage::delete('public/students/'.$post->image);

            //update post with new image
            $post->update([
                'number'  => $request->number,
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'photo'   => $image->hashName()
            ]);

        } else {

            //update post without image
            $post->update([
                'number'     => $request->number,
                'name'     => $request->name,
                'email'   => $request->email,
                'phone'     => $request->phone,
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Student $post)
    {
        //delete image
        Storage::delete('public/students/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
