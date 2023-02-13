<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController; 

class Controller extends BaseController
{
    public function index(Request $request)
    {
    	// mengambil data dari table syllabus
    	$ppmb = DB::table('ppmb')->get();
 
    	// mengirim data syllabus ke view index
    	return view('welcome', ['ppmb' => $ppmb]);
}
}
