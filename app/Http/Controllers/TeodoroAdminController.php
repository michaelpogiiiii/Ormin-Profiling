<?php

namespace App\Http\Controllers;

use App\Models\TeodoroAccReport;
use App\Models\TeodoroProfiles;
use App\Models\TeodoroEvent;
use App\Models\TeodoroMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TeodoroAdminController extends Controller
{
    public function teodoroProfile(Request $request)
    {
        $teodoro_profiles = DB::table('teodoro_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $teodoro_profiles = $teodoro_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $teodoro_profiles = $teodoro_profiles->paginate(10);
        $teodoro_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.teodoro.profile', compact('teodoro_profiles'));
    }

    public function profileTeodoro($id)
    {
        $profile = TeodoroProfiles::where('id', $id)->get();

        return view('admin.teodoro.view-profile', compact('profile'));
    }

    public function teodoroIncEvent()
    {
        $event = TeodoroEvent::all();
        return view('admin.teodoro.inc-event', compact('event'));
    }

    public function saveTeodoroEvent(Request $request)
    {
        $data = new TeodoroEvent();
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

    public function deleteTeodoroEvent($id)
    {
        $event = TeodoroEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function teodoroPstEvent()
    {
        $event = TeodoroEvent::all();
        return view('admin.teodoro.pst-event', compact('event'));
    }

    public function teodoroInactive(Request $request)
    {
        $teodoro_profiles = DB::table('teodoro_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $teodoro_profiles = $teodoro_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $teodoro_profiles = $teodoro_profiles->paginate(10);
        $teodoro_profiles->appends(['users' => $search]);

        return view('admin.teodoro.inactive', compact('teodoro_profiles'));
    }

    public function teodoroInactiveProfile($id)
    {
        $profile = TeodoroProfiles::where('id', $id)->get();

        return view('admin.teodoro.view-inactive', compact('profile'));
    }
    public function teodoroAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = TeodoroAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.teodoro.accomplishment', compact('data'));
    }

    public function addTeodoroAcc(Request $request)
    {
        $data = new TeodoroAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (TeodoroAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadTeodoroAcc($id, $municipality)
    {
        $data = TeodoroAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteTeodoroAcc($id, $municipality)
    {
        $data = TeodoroAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function teodoroMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = TeodoroMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.teodoro.monitoring', compact('data'));
    }

    public function addTeodoroMon(Request $request)
    {
        $data = new TeodoroMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (TeodoroMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadTeodoroMon($id, $municipality)
    {
        $data = TeodoroMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteTeodoroMon($id, $municipality)
    {
        $data = TeodoroMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
