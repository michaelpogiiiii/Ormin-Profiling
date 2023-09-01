<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiling;
use App\Models\SocorroEvent;
use App\Models\SocorroProfiles;
use Carbon\Carbon;

class SocorroController extends Controller
{
    public function profiling()
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $data = SocorroEvent::where('date', '>=', $currentDate)->get();
        $data2 = SocorroEvent::where('date', '<', $currentDate)->get();
        return view('user.socorro.profiling', compact('data', 'data2'));
    }
    public function profileSave(Request $request)
    {
        $data = new SocorroProfiles();
        $data->firstname = $request->firstname;
        $data->middlename = $request->middlename;
        $data->lastname = $request->lastname;
        $data->suffix = $request->suffix;
        $data->region = $request->region;
        $data->province = $request->province;
        $data->municipality = $request->municipality;
        $data->barangay = $request->barangay;
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

    public function viewSocorroEvent($id)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $data = SocorroEvent::where('date', '>=', $currentDate)->get();
        $data2 = SocorroEvent::where('date', '<', $currentDate)->get();
        $event = SocorroEvent::where('id', $id)->get();
        return view('user.socorro.view-socorro-event', compact('event', 'data', 'data2'));
    }
}
