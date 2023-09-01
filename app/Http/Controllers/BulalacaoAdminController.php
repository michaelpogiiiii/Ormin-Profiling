<?php

namespace App\Http\Controllers;

use App\Models\BulalacaoAccReport;
use App\Models\BulalacaoProfiles;
use App\Models\BulalacaoEvent;
use App\Models\BulalacaoMonReport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BulalacaoAdminController extends Controller
{
    public function bulalacaoProfile(Request $request)
    {
        $bulalacao_profiles = DB::table('bulalacao_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bulalacao_profiles = $bulalacao_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $bulalacao_profiles = $bulalacao_profiles->paginate(10);
        $bulalacao_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bulalacao.profile', compact('bulalacao_profiles'));
    }

    public function profileBulalacao($id)
    {
        $profile = BulalacaoProfiles::where('id', $id)->get();

        return view('admin.bulalacao.view-profile', compact('profile'));
    }

    public function bulalacaoIncEvent()
    {
        $event = BulalacaoEvent::all();
        return view('admin.bulalacao.inc-event', compact('event'));
    }

    public function saveBulalacaoEvent(Request $request)
    {
        $data = new BulalacaoEvent();
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

    public function deleteBulalacaoEvent($id)
    {
        $event = BulalacaoEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function bulalacaoPstEvent()
    {
        $event = BulalacaoEvent::all();
        return view('admin.bulalacao.pst-event', compact('event'));
    }

    public function bulalacaoInactive(Request $request)
    {
        $bulalacao_profiles = DB::table('bulalacao_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bulalacao_profiles = $bulalacao_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $bulalacao_profiles = $bulalacao_profiles->paginate(10);
        $bulalacao_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bulalacao.inactive', compact('bulalacao_profiles'));
    }

    public function bulalacaoInactiveProfile($id)
    {
        $profile = BulalacaoProfiles::where('id', $id)->get();

        return view('admin.bulalacao.view-inactive', compact('profile'));
    }
    public function bulalacaoAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = BulalacaoAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bulalacao.accomplishment', compact('data'));
    }

    public function addBulalacaoAcc(Request $request)
    {
        $data = new BulalacaoAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BulalacaoAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadBulalacaoAcc($id, $municipality)
    {
        $data = BulalacaoAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBulalacaoAcc($id, $municipality)
    {
        $data = BulalacaoAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function bulalacaoMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = BulalacaoMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bulalacao.monitoring', compact('data'));
    }

    public function addBulalacaoMon(Request $request)
    {
        $data = new BulalacaoMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (BulalacaoMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadBulalacaoMon($id, $municipality)
    {
        $data = BulalacaoMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBulalacaoMon($id, $municipality)
    {
        $data = BulalacaoMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
