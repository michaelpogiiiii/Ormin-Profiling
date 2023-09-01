<?php

namespace App\Http\Controllers;

use App\Models\GloriaAccReport;
use App\Models\GloriaProfiles;
use App\Models\GloriaEvent;
use App\Models\GloriaMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class GloriaAdminController extends Controller
{
    public function gloriaProfile(Request $request)
    {
        $gloria_profiles = DB::table('gloria_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $gloria_profiles = $gloria_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $gloria_profiles = $gloria_profiles->paginate(10);
        $gloria_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.gloria.profile', compact('gloria_profiles'));
    }

    public function profileGloria($id)
    {
        $profile = GloriaProfiles::where('id', $id)->get();

        return view('admin.gloria.view-profile', compact('profile'));
    }

    public function gloriaIncEvent()
    {
        $event = GloriaEvent::all();
        return view('admin.gloria.inc-event', compact('event'));
    }

    public function saveGloriaEvent(Request $request)
    {
        $data = new GloriaEvent();
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

    public function deleteGloriaEvent($id)
    {
        $event = GloriaEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function gloriaPstEvent()
    {
        $event = GloriaEvent::all();
        return view('admin.gloria.pst-event', compact('event'));
    }

    public function gloriaInactive(Request $request)
    {
        $gloria_profiles = DB::table('gloria_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $gloria_profiles = $gloria_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $gloria_profiles = $gloria_profiles->paginate(10);
        $gloria_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.gloria.inactive', compact('gloria_profiles'));
    }

    public function gloriaInactiveProfile($id)
    {
        $profile = GloriaProfiles::where('id', $id)->get();

        return view('admin.gloria.view-inactive', compact('profile'));
    }
    public function gloriaAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = GloriaAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.gloria.accomplishment', compact('data'));
    }

    public function addGloriaAcc(Request $request)
    {
        $data = new GloriaAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (GloriaAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadGloriaAcc($id, $municipality)
    {
        $data = GloriaAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteGloriaAcc($id, $municipality)
    {
        $data = GloriaAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function gloriaMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = GloriaMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.gloria.monitoring', compact('data'));
    }

    public function addGloriaMon(Request $request)
    {
        $data = new GloriaMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (GloriaMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadGloriaMon($id, $municipality)
    {
        $data = GloriaMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteGloriaMon($id, $municipality)
    {
        $data = GloriaMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
