<?php

namespace App\Http\Controllers;

use App\Models\BansudProfiles;
use App\Models\BansudEvent;
use App\Models\BansudAccReport;
use App\Models\BansudMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BansudAdminController extends Controller
{
    public function bansudProfile(Request $request)
    {
        $bansud_profiles = DB::table('bansud_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bansud_profiles = $bansud_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }


        $bansud_profiles = $bansud_profiles->paginate(10);
        $bansud_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bansud.profile', compact('bansud_profiles'));
    }

    public function profileBansud($id)
    {
        $profile = BansudProfiles::where('id', $id)->get();

        return view('admin.bansud.view-profile', compact('profile'));
    }

    public function bansudIncEvent()
    {
        $event = BansudEvent::all();
        return view('admin.bansud.inc-event', compact('event'));
    }

    public function saveBansudEvent(Request $request)
    {
        $data = new BansudEvent();
        $photo = $request->photo;
        $photoname = time() . '.' . $photo->getClientOriginalExtension();
        $request->photo->move('eventimage', $photoname);
        $data->photo = $photoname;

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $data->about = $request->about;
        $data->location = $request->location;
        $data->date = $request->date;
        $data->save();

        return redirect()->back()->with('message', 'New Event Added Successfully');
    }

    public function deleteBansudEvent($id)
    {
        $event = BansudEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function bansudPstEvent()
    {
        $event = BansudEvent::all();
        return view('admin.bansud.pst-event', compact('event'));
    }

    public function bansudInactive(Request $request)
    {
        $bansud_profiles = DB::table('bansud_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bansud_profiles = $bansud_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }


        $bansud_profiles = $bansud_profiles->paginate(10);
        $bansud_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bansud.inactive', compact('bansud_profiles'));
    }

    public function bansudInactiveProfile($id)
    {
        $profile = BansudProfiles::where('id', $id)->get();

        return view('admin.bansud.view-inactive', compact('profile'));
    }


    public function bansudAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = BansudAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bansud.accomplishment', compact('data'));
    }


    public function addBansudAcc(Request $request)
    {
        $data = new bansudAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (bansudAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadBansudAcc($id, $municipality)
    {
        $data = BansudAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBansudAcc($id, $municipality)
    {
        $data = BansudAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function bansudMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = BansudMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bansud.monitoring', compact('data'));
    }


    public function addBansudMon(Request $request)
    {
        $data = new BansudMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (bansudMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadBansudMon($id, $municipality)
    {
        $data = BansudMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBansudMon($id, $municipality)
    {
        $data = BansudMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
