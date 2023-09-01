<?php

namespace App\Http\Controllers;

use App\Models\BongabongAccReport;
use App\Models\BongabongProfiles;
use App\Models\BongabongEvent;
use App\Models\BongabongMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BongabongAdminController extends Controller
{
    public function bongabongProfile(Request $request)
    {
        $bongabong_profiles = DB::table('bongabong_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bongabong_profiles = $bongabong_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $bongabong_profiles = $bongabong_profiles->paginate(10);
        $bongabong_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bongabong.profile', compact('bongabong_profiles'));
    }

    public function profileBongabong($id)
    {
        $profile = BongabongProfiles::where('id', $id)->get();

        return view('admin.bongabong.view-profile', compact('profile'));
    }

    public function bongabongIncEvent()
    {
        $event = BongabongEvent::all();
        return view('admin.bongabong.inc-event', compact('event'));
    }

    public function saveBongabongEvent(Request $request)
    {
        $data = new BongabongEvent();
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

    public function deleteBongabongEvent($id)
    {
        $event = BongabongEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function bongabongPstEvent()
    {
        $event = BongabongEvent::all();
        return view('admin.bongabong.pst-event', compact('event'));
    }

    public function bongabongInactive(Request $request)
    {
        $bongabong_profiles = DB::table('bongabong_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bongabong_profiles = $bongabong_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $bongabong_profiles = $bongabong_profiles->paginate(10);
        $bongabong_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bongabong.inactive', compact('bongabong_profiles'));
    }

    public function bongabongInactiveProfile($id)
    {
        $profile = BongabongProfiles::where('id', $id)->get();

        return view('admin.bongabong.view-inactive', compact('profile'));
    }
    public function bongabongAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = BongabongAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bongabong.accomplishment', compact('data'));
    }

    public function addBongabongAcc(Request $request)
    {
        $data = new BongabongAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BongabongAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadBongabongAcc($id, $municipality)
    {
        $data = BongabongAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBongabongAcc($id, $municipality)
    {
        $data = BongabongAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function bongabongMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = BongabongMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bongabong.monitoring', compact('data'));
    }

    public function addBongabongMon(Request $request)
    {
        $data = new bongabongMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BongabongMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadBongabongMon($id, $municipality)
    {
        $data = BongabongMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBongabongMon($id, $municipality)
    {
        $data = BongabongMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
