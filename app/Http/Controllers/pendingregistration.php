<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendingregistration extends Controller
{
    public function pendingRegistration(Request $request)
    {
     return view('pydc.pendregist');
    }

    public function disApproved(Request $request)
    {
        return view('pydc.disapproved');
    }

    public function waitList(Request $request)
    {
        return view('pydc.waitlist');
    }
}