<?php

namespace App\Http\Controllers;

use App\Models\MansalayAccReport;
use App\Models\MansalayProfiles;
use App\Models\MansalayEvent;
use App\Models\MansalayMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MansalayAdminController extends Controller
{
    public function mansalayProfile(Request $request)
    {
        $mansalay_profiles = DB::table('mansalay_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $mansalay_profiles = $mansalay_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $mansalay_profiles = $mansalay_profiles->paginate(10);
        $mansalay_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.mansalay.profile', compact('mansalay_profiles'));
    }

    public function profileMansalay($id)
    {
        $profile = MansalayProfiles::where('id', $id)->get();

        return view('admin.mansalay.view-profile', compact('profile'));
    }

    public function mansalayIncEvent()
    {
        $event = MansalayEvent::all();
        return view('admin.mansalay.inc-event', compact('event'));
    }

    public function saveMansalayEvent(Request $request)
    {
        $data = new MansalayEvent();
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

    public function deleteMansalayEvent($id)
    {
        $event = MansalayEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function mansalayPstEvent()
    {
        $event = MansalayEvent::all();
        return view('admin.mansalay.pst-event', compact('event'));
    }

    public function mansalayInactive(Request $request)
    {
        $mansalay_profiles = DB::table('mansalay_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $mansalay_profiles = $mansalay_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $mansalay_profiles = $mansalay_profiles->paginate(10);
        $mansalay_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.mansalay.inactive', compact('mansalay_profiles'));
    }

    public function mansalayInactiveProfile($id)
    {
        $profile = MansalayProfiles::where('id', $id)->get();

        return view('admin.mansalay.view-inactive', compact('profile'));
    }
    public function mansalayAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = MansalayAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.mansalay.accomplishment', compact('data'));
    }

    public function addMansalayAcc(Request $request)
    {
        $data = new MansalayAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (MansalayAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadMansalayAcc($id, $municipality)
    {
        $data = MansalayAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteMansalayAcc($id, $municipality)
    {
        $data = MansalayAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function mansalayMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = MansalayMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.mansalay.monitoring', compact('data'));
    }

    public function addMansalayMon(Request $request)
    {
        $data = new MansalayMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (MansalayMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadMansalayMon($id, $municipality)
    {
        $data = MansalayMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteMansalayMon($id, $municipality)
    {
        $data = MansalayMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
