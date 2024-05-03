<?php

namespace App\Http\Controllers;

use App\Models\VictoriaProfiles;
use App\Models\VicotoriaEvent;
use App\Models\VictoriaAccReport;
use App\Models\VictoriaMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VictoriaAdminController extends Controller
{
    public function victoriaProfile(Request $request)
    {
        $victoria_profiles = DB::table('victoria_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $victoria_profiles = $victoria_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $victoria_profiles = $victoria_profiles->paginate(10);
        $victoria_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.victoria.profile', compact('victoria_profiles'));
    }
    public function victoriaDisapproved(Request $request)
    {
  
        return view('admin.victoria.disapproved');
    }
    public function victoriaWaitList(Request $request)
    {
        
        return view('admin.victoria.waitlist');
    }
    public function victoriaApproved(Request $request)
    {
   
         return view('admin.victoria.approved');
    }
    public function victoriaExpired(Request $request)
    {
 
     return view('admin.victoria.expired');
    }
    public function profileVictoria($id)
    {
        $profile = VictoriaProfiles::where('id', $id)->get();

        return view('admin.victoria.view-profile', compact('profile'));
    }

    public function victoriaIncEvent()
    {
        $event = VicotoriaEvent::all();
        return view('admin.victoria.inc-event', compact('event'));
    }

    public function saveVictoriaEvent(Request $request)
    {
        $data = new VicotoriaEvent();
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

    public function deleteVictoriaEvent($id)
    {
        $event = VicotoriaEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function victoriaPstEvent()
    {
        $event = VicotoriaEvent::all();
        return view('admin.victoria.pst-event', compact('event'));
    }

    public function victoriaInactive(Request $request)
    {
        $victoria_profiles = DB::table('victoria_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $victoria_profiles = $victoria_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $victoria_profiles = $victoria_profiles->paginate(10);
        $victoria_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.victoria.inactive', compact('victoria_profiles'));
    }

    public function victoriaInactiveProfile($id)
    {
        $profile = VictoriaProfiles::where('id', $id)->get();

        return view('admin.victoria.view-inactive', compact('profile'));
    }
    public function victoriaAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = VictoriaAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.victoria.accomplishment', compact('data'));
    }

    public function addVictoriaAcc(Request $request)
    {
        $data = new VictoriaAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (VictoriaAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadVictoriaAcc($id, $municipality)
    {
        $data = VictoriaAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteVictoriaAcc($id, $municipality)
    {
        $data = VictoriaAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function victoriaMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = VictoriaMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.victoria.monitoring', compact('data'));
    }

    public function addVictoriaMon(Request $request)
    {
        $data = new VictoriaMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (VictoriaMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadVictoriaMon($id, $municipality)
    {
        $data = VictoriaMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteVictoriaMon($id, $municipality)
    {
        $data = VictoriaMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
