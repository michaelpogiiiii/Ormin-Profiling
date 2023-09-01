<?php

namespace App\Http\Controllers;

use App\Models\BansudEvent;
use App\Models\BansudProfiles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BansudController extends Controller
{
    public function profiling()
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $data = BansudEvent::where('date', '>=', $currentDate)->get();
        $data2 = BansudEvent::where('date', '<', $currentDate)->get();
        return view('user.bansud.profiling', compact('data', 'data2'));
    }
    public function profileSave(Request $request)
    {
        $data = new BansudProfiles;
        $data->firstname = $request->firstname; //database = blade.php
        $data->middlename = $request->middlename;
        $data->lastname = $request->lastname;
        $data->suffix = $request->suffix;
        $data->region = $request->region;
        $data->province = $request->province;
        $data->municipality = $request->municipality;
        $data->barangay = $request->input('barangay');
        $data->purok = $request->purok;
        $data->sex = $request->sex;
        $data->age = $request->age;
        $data->bday = $request->bday;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->status = $request->status;
        $data->youthclass = $request->youthclass;
        $data->workstat = $request->workstat;
        $data->educback = $request->educback;
        $data->skvoter = $request->skvoter;
        $data->skvoterlast = $request->skvoterlast;
        $data->nationalvoter = $request->nationalvoter;
        $data->assembly = $request->assembly;
        $data->assembly_attend = $request->assembly_attend;
        $data->assembly_noattend = $request->assembly_noattend;
        $data->save();
        return redirect()->back()->with('message', 'Profile Successfully Saved!');
    }

    public function viewBansudEvent($id)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $data = BansudEvent::where('date', '>=', $currentDate)->get();
        $data2 = BansudEvent::where('date', '<', $currentDate)->get();
        $event = BansudEvent::where('id', $id)->get();
        return view('user.bansud.view-bansud-event', compact('event', 'data', 'data2'));
    }
}
