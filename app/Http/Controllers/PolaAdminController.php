<?php

namespace App\Http\Controllers;

use App\Models\PolaAccReport;
use App\Models\PolaProfiles;
use App\Models\PolaEvent;
use App\Models\PolaMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PolaAdminController extends Controller
{
    public function polaProfile(Request $request)
    {
        $pola_profiles = DB::table('pola_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $pola_profiles = $pola_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $pola_profiles = $pola_profiles->paginate(10);
        $pola_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.pola.profile', compact('pola_profiles'));
    }

    public function profilePola($id)
    {
        $profile = PolaProfiles::where('id', $id)->get();

        return view('admin.pola.view-profile', compact('profile'));
    }

    public function polaIncEvent()
    {
        $event = PolaEvent::all();
        return view('admin.pola.inc-event', compact('event'));
    }

    public function savePolaEvent(Request $request)
    {
        $data = new PolaEvent();
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

    public function deletePolaEvent($id)
    {
        $event = PolaEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function polaPstEvent()
    {
        $event = PolaEvent::all();
        return view('admin.pola.pst-event', compact('event'));
    }

    public function polaInactive(Request $request)
    {
        $pola_profiles = DB::table('pola_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $pola_profiles = $pola_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $pola_profiles = $pola_profiles->paginate(10);
        $pola_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.pola.inactive', compact('pola_profiles'));
    }

    public function polaInactiveProfile($id)
    {
        $profile = PolaProfiles::where('id', $id)->get();

        return view('admin.pola.view-inactive', compact('profile'));
    }
    public function polaAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = PolaAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.pola.accomplishment', compact('data'));
    }

    public function addPolaAcc(Request $request)
    {
        $data = new PolaAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PolaAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadPolaAcc($id, $municipality)
    {
        $data = PolaAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePolaAcc($id, $municipality)
    {
        $data = PolaAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function polaMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = PolaMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.pola.monitoring', compact('data'));
    }

    public function addPolaMon(Request $request)
    {
        $data = new PolaMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PolaMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadPolaMon($id, $municipality)
    {
        $data = PolaMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePolaMon($id, $municipality)
    {
        $data = PolaMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
