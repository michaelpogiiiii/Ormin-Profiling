<?php

namespace App\Http\Controllers;

use App\Models\RoxasAccReport;
use App\Models\RoxasProfiles;
use App\Models\RoxasEvent;
use App\Models\RoxasMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RoxasAdminController extends Controller
{
    public function roxasProfile(Request $request)
    {
        $roxas_profiles = DB::table('roxas_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $roxas_profiles = $roxas_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $roxas_profiles = $roxas_profiles->paginate(10);
        $roxas_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.roxas.profile', compact('roxas_profiles'));
    }
    public function roxasDisapproved(Request $request)
    {
  
        return view('admin.roxas.disapproved');
    }
    public function roxasWaitList(Request $request)
    {
        
        return view('admin.roxas.waitlist');
    }
    public function roxasApproved(Request $request)
    {
   
         return view('admin.roxas.approved');
    }
    public function roxasExpired(Request $request)
    {
 
     return view('admin.roxas.expired');
    }
    public function profileRoxas($id)
    {
        $profile = RoxasProfiles::where('id', $id)->get();

        return view('admin.roxas.view-profile', compact('profile'));
    }

    public function roxasIncEvent()
    {
        $event = RoxasEvent::all();
        return view('admin.roxas.inc-event', compact('event'));
    }

    public function saveRoxasEvent(Request $request)
    {
        $data = new RoxasEvent();
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

    public function deleteRoxasEvent($id)
    {
        $event = RoxasEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function roxasPstEvent()
    {
        $event = RoxasEvent::all();
        return view('admin.roxas.pst-event', compact('event'));
    }

    public function roxasInactive(Request $request)
    {
        $roxas_profiles = DB::table('roxas_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $roxas_profiles = $roxas_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $roxas_profiles = $roxas_profiles->paginate(10);
        $roxas_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.roxas.inactive', compact('roxas_profiles'));
    }

    public function roxasInactiveProfile($id)
    {
        $profile = RoxasProfiles::where('id', $id)->get();

        return view('admin.roxas.view-inactive', compact('profile'));
    }
    public function roxasAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = RoxasAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.roxas.accomplishment', compact('data'));
    }

    public function addRoxasAcc(Request $request)
    {
        $data = new RoxasAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (RoxasAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadRoxasAcc($id, $municipality)
    {
        $data = RoxasAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteRoxasAcc($id, $municipality)
    {
        $data = RoxasAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function roxasMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = RoxasMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.roxas.monitoring', compact('data'));
    }

    public function addRoxasMon(Request $request)
    {
        $data = new RoxasMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (RoxasMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadRoxasMon($id, $municipality)
    {
        $data = RoxasMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteRoxasMon($id, $municipality)
    {
        $data = RoxasMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
