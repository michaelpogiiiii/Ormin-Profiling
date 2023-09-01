<?php

namespace App\Http\Controllers;

use App\Models\PinamalayanAccReport;
use App\Models\PinamalayanProfiles;
use App\Models\PinamalayanEvent;
use App\Models\PinamalayanMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PinamalayanAdminController extends Controller
{
    public function pinamalayanProfile(Request $request)
    {
        $pinamalayan_profiles = DB::table('pinamalayan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $pinamalayan_profiles = $pinamalayan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $pinamalayan_profiles = $pinamalayan_profiles->paginate(10);
        $pinamalayan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.pinamalayan.profile', compact('pinamalayan_profiles'));
    }

    public function profilePinamalayan($id)
    {
        $profile = PinamalayanProfiles::where('id', $id)->get();

        return view('admin.pinamalayan.view-profile', compact('profile'));
    }

    public function pinamalayanIncEvent()
    {
        $event = PinamalayanEvent::all();
        return view('admin.pinamalayan.inc-event', compact('event'));
    }

    public function savePinamalayanEvent(Request $request)
    {
        $data = new PinamalayanEvent();
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

    public function deletePinamalayanEvent($id)
    {
        $event = PinamalayanEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function pinamalayanPstEvent()
    {
        $event = PinamalayanEvent::all();
        return view('admin.pinamalayan.pst-event', compact('event'));
    }

    public function pinamalayanInactive(Request $request)
    {
        $pinamalayan_profiles = DB::table('pinamalayan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $pinamalayan_profiles = $pinamalayan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $pinamalayan_profiles = $pinamalayan_profiles->paginate(10);
        $pinamalayan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.pinamalayan.inactive', compact('pinamalayan_profiles'));
    }

    public function pinamalayanInactiveProfile($id)
    {
        $profile = PinamalayanProfiles::where('id', $id)->get();

        return view('admin.pinamalayan.view-inactive', compact('profile'));
    }
    public function pinamalayanAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = PinamalayanAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.pinamalayan.accomplishment', compact('data'));
    }

    public function addPinamalayanAcc(Request $request)
    {
        $data = new PinamalayanAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PinamalayanAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadPinamalayanAcc($id, $municipality)
    {
        $data = PinamalayanAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePinamalayanAcc($id, $municipality)
    {
        $data = PinamalayanAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function pinamalayanMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = PinamalayanMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.pinamalayan.monitoring', compact('data'));
    }

    public function addPinamalayanMon(Request $request)
    {
        $data = new PinamalayanMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PinamalayanMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadPinamalayanMon($id, $municipality)
    {
        $data = PinamalayanMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePinamalayanMon($id, $municipality)
    {
        $data = PinamalayanMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
