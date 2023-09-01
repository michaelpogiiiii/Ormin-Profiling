<?php

namespace App\Http\Controllers;

use App\Models\NaujanAccReport;
use App\Models\NaujanProfiles;
use App\Models\NaujanEvent;
use App\Models\NaujanMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class NaujanAdminController extends Controller
{
    public function naujanProfile(Request $request)
    {
        $naujan_profiles = DB::table('naujan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $naujan_profiles = $naujan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $naujan_profiles = $naujan_profiles->paginate(10);
        $naujan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.naujan.profile', compact('naujan_profiles'));
    }

    public function profileNaujan($id)
    {
        $profile = NaujanProfiles::where('id', $id)->get();

        return view('admin.naujan.view-profile', compact('profile'));
    }

    public function naujanIncEvent()
    {
        $event = NaujanEvent::all();
        return view('admin.naujan.inc-event', compact('event'));
    }

    public function saveNaujanEvent(Request $request)
    {
        $data = new NaujanEvent();
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

    public function deleteNaujanEvent($id)
    {
        $event = NaujanEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function naujanPstEvent()
    {
        $event = NaujanEvent::all();
        return view('admin.naujan.pst-event', compact('event'));
    }

    public function naujanInactive(Request $request)
    {
        $naujan_profiles = DB::table('naujan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $naujan_profiles = $naujan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $naujan_profiles = $naujan_profiles->paginate(10);
        $naujan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.naujan.inactive', compact('naujan_profiles'));
    }

    public function naujanInactiveProfile($id)
    {
        $profile = NaujanProfiles::where('id', $id)->get();

        return view('admin.naujan.view-inactive', compact('profile'));
    }
    public function naujanAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = NaujanAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.naujan.accomplishment', compact('data'));
    }

    public function addNaujanAcc(Request $request)
    {
        $data = new NaujanAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (NaujanAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadNaujanAcc($id, $municipality)
    {
        $data = NaujanAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteNaujanAcc($id, $municipality)
    {
        $data = NaujanAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function naujanMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = NaujanMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.naujan.monitoring', compact('data'));
    }

    public function addNaujanMon(Request $request)
    {
        $data = new NaujanMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (NaujanMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadNaujanMon($id, $municipality)
    {
        $data = NaujanMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteNaujanMon($id, $municipality)
    {
        $data = NaujanMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
