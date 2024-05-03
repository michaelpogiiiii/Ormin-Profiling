<?php

namespace App\Http\Controllers;

use App\Models\CalapanAccReport;
use App\Models\CalapanProfiles;
use App\Models\CalapanEvent;
use App\Models\CalapanMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CalapanAdminController extends Controller
{
    public function calapanProfile(Request $request)
    {
        $calapan_profiles = DB::table('calapan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $calapan_profiles = $calapan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $calapan_profiles = $calapan_profiles->paginate(10);
        $calapan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.calapan.profile', compact('calapan_profiles'));
    }
    public function calapanDisapproved(Request $request)
    {
  
        return view('admin.calapan.disapproved');
    }
    public function calapanWaitList(Request $request)
    {
        
        return view('admin.calapan.waitlist');
    }
    public function calapanApproved(Request $request)
    {
   
         return view('admin.calapan.approved');
    }
    public function calapanExpired(Request $request)
    {
     return view('admin.calapan.expired');
    }
    public function profileCalapan($id)
    {
        $profile = CalapanProfiles::where('id', $id)->get();

        return view('admin.calapan.view-profile', compact('profile'));
    }

    public function calapanIncEvent()
    {
        $event = CalapanEvent::all();
        return view('admin.calapan.inc-event', compact('event'));
    }

    public function saveCalapanEvent(Request $request)
    {
        $data = new CalapanEvent();
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

    public function deleteCalapanEvent($id)
    {
        $event = CalapanEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function calapanPstEvent()
    {
        $event = CalapanEvent::all();
        return view('admin.calapan.pst-event', compact('event'));
    }

    public function calapanInactive(Request $request)
    {
        $calapan_profiles = DB::table('calapan_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $calapan_profiles = $calapan_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $calapan_profiles = $calapan_profiles->paginate(10);
        $calapan_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.calapan.inactive', compact('calapan_profiles'));
    }

    public function calapanInactiveProfile($id)
    {
        $profile = CalapanProfiles::where('id', $id)->get();

        return view('admin.calapan.view-inactive', compact('profile'));
    }
    public function calapanAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = CalapanAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.calapan.accomplishment', compact('data'));
    }

    public function addCalapanAcc(Request $request)
    {
        $data = new CalapanAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (CalapanAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadCalapanAcc($id, $municipality)
    {
        $data = CalapanAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteCalapanAcc($id, $municipality)
    {
        $data = CalapanAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function calapanMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = CalapanMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.calapan.monitoring', compact('data'));
    }

    public function addCalapanMon(Request $request)
    {
        $data = new CalapanMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (CalapanMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadCalapanMon($id, $municipality)
    {
        $data = CalapanMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteCalapanMon($id, $municipality)
    {
        $data = CalapanMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
