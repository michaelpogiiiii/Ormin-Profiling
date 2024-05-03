<?php

namespace App\Http\Controllers;

use App\Models\SocorroAccReport;
use App\Models\SocorroProfiles;
use App\Models\SocorroEvent;
use App\Models\SocorroMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SocorroAdminController extends Controller
{
    public function socorroProfile(Request $request)
    {
        $socorro_profiles = DB::table('socorro_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $socorro_profiles = $socorro_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $socorro_profiles = $socorro_profiles->paginate(10);
        $socorro_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.socorro.profile', compact('socorro_profiles'));
    }
    public function socorroDisapproved(Request $request)
    {
  
        return view('admin.socorro.disapproved');
    }
    public function socorroWaitList(Request $request)
    {
        
        return view('admin.socorro.waitlist');
    }
    public function socorroApproved(Request $request)
    {
   
         return view('admin.socorro.approved');
    }
    public function socorroExpired(Request $request)
    {
 
     return view('admin.socorro.expired');
    }
    public function profileSocorro($id)
    {
        $profile = SocorroProfiles::where('id', $id)->get();

        return view('admin.socorro.view-profile', compact('profile'));
    }

    public function socorroIncEvent()
    {
        $event = SocorroEvent::all();
        return view('admin.socorro.inc-event', compact('event'));
    }

    public function saveSocorroEvent(Request $request)
    {
        $data = new SocorroEvent();
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

    public function deleteSocorroEvent($id)
    {
        $event = SocorroEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function socorroPstEvent()
    {
        $event = SocorroEvent::all();
        return view('admin.socorro.pst-event', compact('event'));
    }

    public function socorroInactive(Request $request)
    {
        $socorro_profiles = DB::table('socorro_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $socorro_profiles = $socorro_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $socorro_profiles = $socorro_profiles->paginate(10);
        $socorro_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.socorro.inactive', compact('socorro_profiles'));
    }

    public function socorroInactiveProfile($id)
    {
        $profile = SocorroProfiles::where('id', $id)->get();

        return view('admin.socorro.view-inactive', compact('profile'));
    }
    public function socorroAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = SocorroAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.socorro.accomplishment', compact('data'));
    }

    public function addSocorroAcc(Request $request)
    {
        $data = new SocorroAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (SocorroAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadSocorroAcc($id, $municipality)
    {
        $data = SocorroAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteSocorroAcc($id, $municipality)
    {
        $data = SocorroAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function socorroMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = SocorroMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.socorro.monitoring', compact('data'));
    }

    public function addSocorroMon(Request $request)
    {
        $data = new SocorroMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (SocorroMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadSocorroMon($id, $municipality)
    {
        $data = SocorroMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteSocorroMon($id, $municipality)
    {
        $data = SocorroMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
