<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class approved extends Controller
{
    public function Approved(Request $request)
    {
     return view('pydc.approved');
    }
}
