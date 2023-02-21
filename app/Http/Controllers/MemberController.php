<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(Request $request)
    {
        $group_id = $request->query('group_id');
        $members = DB::table('members')->where('group_id', $group_id)->get();


    // Render View with member
       return view('members.index', compact('members'));

    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $student = Student::all();
        $groups = group::all();
            // dd($groups);
        return view('members.create', [
            'gr' => $groups,
            'student' => $student
            
        ]);
    
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
        $request->validate([
            'group'     => 'required',
            'student_id'     => 'required',
        ]);

        //create post
        Member::create([
            'group_id'   => $request->group,
            'student_id'      => $request->student_id
        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $group = Member::all();
        // $groups = DB::table('members')
        //     ->select('members.*','groups.name as group_name','students.name')
        //     ->join('groups', 'groups.id', '=', 'members.group_id')
        //     ->join('members.student_id','=','students.id')
        //     ->where('groups.id','=',$id)
        //     ->get();
        // dd($group);
        return view('members.index', compact('group'));
    }
}