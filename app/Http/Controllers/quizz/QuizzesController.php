<?php

namespace App\Http\Controllers\quizz;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quizzes = Quiz::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('quizz', 'LIKE', "%$keyword%")
                ->orWhere('opsi1', 'LIKE', "%$keyword%")
                ->orWhere('opsi2', 'LIKE', "%$keyword%")
                ->orWhere('opsi3', 'LIKE', "%$keyword%")
                ->orWhere('opsi4', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizzes = Quiz::latest()->paginate($perPage);
        }

        return view('quizz.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('quizz.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Quiz::create($requestData);

        return redirect('quizz/quizzes')->with('flash_message', 'Quiz added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('quizz.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('quizz.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $quiz = Quiz::findOrFail($id);
        $quiz->update($requestData);

        return redirect('quizz/quizzes')->with('flash_message', 'Quiz updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Quiz::destroy($id);

        return redirect('quizz/quizzes')->with('flash_message', 'Quiz deleted!');
    }
}
