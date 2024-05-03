<?php

namespace App\Http\Controllers;

use App\Models\BacoAccReport;
use App\Models\BacoProfiles;
use App\Models\BacoEvent;
use App\Models\BacoMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BacoAdminController extends Controller
{
    public function bacoProfile(Request $request)
    {
        $baco_profiles = DB::table('baco_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $baco_profiles = $baco_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $baco_profiles = $baco_profiles->paginate(10);
        $baco_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.baco.profile', compact('baco_profiles'));
    }
    public function bacoDisapproved(Request $request)
    {
  
        return view('admin.baco.disapproved');
    }
    public function bacoWaitList(Request $request)
    {
        
        return view('admin.baco.waitlist');
    }
    public function bacoApproved(Request $request)
    {
   
         return view('admin.baco.approved');
    }
    public function bacoExpired(Request $request)
    {
     return view('admin.baco.expired');
    }
    public function profileBaco($id)
    {
        $profile = BacoProfiles::where('id', $id)->get();

        return view('admin.baco.view-profile', compact('profile'));
    }

    public function bacoIncEvent()
    {
        $event = BacoEvent::all();
        return view('admin.baco.inc-event', compact('event'));
    }

    public function saveBacoEvent(Request $request)
    {
        $data = new BacoEvent();
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

    public function deleteBacoEvent($id)
    {
        $event = BacoEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function bacoPstEvent()
    {
        $event = BacoEvent::all();
        return view('admin.baco.pst-event', compact('event'));
    }

    public function bacoInactive(Request $request)
    {
        $baco_profiles = DB::table('baco_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $baco_profiles = $baco_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $baco_profiles = $baco_profiles->paginate(10);
        $baco_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.baco.inactive', compact('baco_profiles'));
    }

    public function bacoInactiveProfile($id)
    {
        $profile = BacoProfiles::where('id', $id)->get();

        return view('admin.baco.view-inactive', compact('profile'));
    }

    public function bacoAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = BacoAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.baco.accomplishment', compact('data'));
    }

    public function addBacoAcc(Request $request)
    {
        $data = new BacoAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BacoAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadBacoAcc($id, $municipality)
    {
        $data = BacoAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBacoAcc($id, $municipality)
    {
        $data = BacoAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function bacoMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = BacoMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.baco.monitoring', compact('data'));
    }

    public function addBacoMon(Request $request)
    {
        $data = new BacoMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BacoMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadBacoMon($id, $municipality)
    {
        $data = BacoMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBacoMon($id, $municipality)
    {
        $data = BacoMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
