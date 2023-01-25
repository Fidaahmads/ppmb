<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{   
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get schedules
        $schedules = Schedule::latest()->paginate(5);

        //render view with schedules
        return view('schedules.index', compact('schedules'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('schedules.create');
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
            'group_id'  => 'required|min:5',
            'user_id'    => 'required|min:10',
            'note'   => 'required|min:10',
            'time_start_at'   => 'required|min:10',
            'time_end_at'   => 'required|min:10',
        ]);


        //create student
        Schedule ::create([
            'group_id'  => $request->group_id,
            'user_id'    => $request->user_id,
            'note'   => $request->note,
            'time_start_at'   => $request->time_start_at,
            'time_end_at'   => $request->time_end_at,
        ]);

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $student
     * @return void
     */
    public function edit(Schedule $student)
    {
        return view('schedules.edit', compact('student'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Schedule $student)
    {
        //validate form
        $request->validate( [
            'group_id'  => 'required|min:5',
            'user_id'    => 'required|min:5',
            'note'   => 'required|min:10',
            'time_start_at'   => 'required|min:10',
            'time_end_at'   => 'required|min:10',
        ]);

            //update student with new photo$photo
            $student->update([
                'group_id'  => $request->group_id,
                'user_id'    => $request->user_id,
                'note'   => $request->note,
                'time_start_at'   => $request->time_start_at,
                'time_end_at'   => $request->time_end_at,
            ]);

        }

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy(Schedule $student)
    {
        //delete student
        $student->delete();

        //redirect to index
        return redirect()->route('schedules.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

