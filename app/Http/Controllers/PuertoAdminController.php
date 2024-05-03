<?php

namespace App\Http\Controllers;

use App\Models\PuertoAccReport;
use App\Models\PuertoProfiles;
use App\Models\PuertoEvent;
use App\Models\PuertoMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PuertoAdminController extends Controller
{
    public function puertoProfile(Request $request)
    {
        $puerto_profiles = DB::table('puerto_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $puerto_profiles = $puerto_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $puerto_profiles = $puerto_profiles->paginate(10);
        $puerto_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.puerto.profile', compact('puerto_profiles'));
    }
    public function puertoDisapproved(Request $request)
    {
  
        return view('admin.puerto.disapproved');
    }
    public function puertoWaitList(Request $request)
    {
        
        return view('admin.puerto.waitlist');
    }
    public function puertoApproved(Request $request)
    {
   
         return view('admin.puerto.approved');
    }
    public function puertoExpired(Request $request)
    {
 
     return view('admin.puerto.expired');
    }
    public function profilePuerto($id)
    {
        $profile = PuertoProfiles::where('id', $id)->get();

        return view('admin.puerto.view-profile', compact('profile'));
    }

    public function puertoIncEvent()
    {
        $event = PuertoEvent::all();
        return view('admin.puerto.inc-event', compact('event'));
    }

    public function savePuertoEvent(Request $request)
    {
        $data = new PuertoEvent();
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

    public function deletePuertoEvent($id)
    {
        $event = PuertoEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function puertoPstEvent()
    {
        $event = PuertoEvent::all();
        return view('admin.puerto.pst-event', compact('event'));
    }

    public function puertoInactive(Request $request)
    {
        $puerto_profiles = DB::table('puerto_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $puerto_profiles = $puerto_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $puerto_profiles = $puerto_profiles->paginate(10);
        $puerto_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.puerto.inactive', compact('puerto_profiles'));
    }

    public function puertoInactiveProfile($id)
    {
        $profile = PuertoProfiles::where('id', $id)->get();

        return view('admin.puerto.view-inactive', compact('profile'));
    }
    public function puertoAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = PuertoAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.puerto.accomplishment', compact('data'));
    }

    public function addPuertoAcc(Request $request)
    {
        $data = new PuertoAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PuertoAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadPuertoAcc($id, $municipality)
    {
        $data = PuertoAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePuertoAcc($id, $municipality)
    {
        $data = PuertoAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function puertoMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = PuertoMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.puerto.monitoring', compact('data'));
    }

    public function addPuertoMon(Request $request)
    {
        $data = new PuertoMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (PuertoMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadPuertoMon($id, $municipality)
    {
        $data = PuertoMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deletePuertoMon($id, $municipality)
    {
        $data = PuertoMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
