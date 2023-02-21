<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class GroupController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get groups

        // $groups = Group::latest()->paginate(5);
        // $groups = Group::with('users')->get();


        $groups = Group::all();
      
        //render view with groups
        return view('groups.index', compact('groups'));
    }

    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $group = User::all();
        return view('groups.create', compact('group'));
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
            'user_id'     => 'required',
            'name'     => 'required',
        ]);

        //create post
        Group::create([
            'user_id'   => $request->user_id,
            'name'      => $request->name
        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * edit
     *
     * @param  mixed $group
     * @return void
     */
    public function edit(Group $group)
    {
        // $selectedUserId = $group->id;
        // return view('groups.edit', ['group' => $group, 'selectedUserId' => $selectedUserId]);
        // return view('groups.edit', compact('group'));

        // $group = User::all();
        return view('groups.edit', compact('group'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $group
     * @return void
     */
    public function update(Request $request, Group $group)
    {
        //validate form
        $request->validate([  
            'name'     => 'required',
        ]);

        //update group
        $group->update([

            'name'      => $request->name
        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Group $group)
    {
        // Delete Data
        $group->delete();

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}