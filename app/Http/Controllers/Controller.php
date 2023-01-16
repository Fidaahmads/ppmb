<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController; 

class Controller extends BaseController
{
    public function index()
    {
    	// mengambil data dari table syllabus
    	$mitq = DB::table('mitq')->get();
 
    	// mengirim data syllabus ke view index
    	return view('welcome', ['mitq' => $mitq]);
}
}
