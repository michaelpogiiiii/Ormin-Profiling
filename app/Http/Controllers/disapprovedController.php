<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class disapproved extends Controller
{
    public function disApproved(Request $request)
    {
        return view('pydc.disapproved', compact('disapproved'));
    }
}

