<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpiredController extends Controller
{
    public function Expired(Request $request)
    {
     return view('pydc.expired');
    }
}
