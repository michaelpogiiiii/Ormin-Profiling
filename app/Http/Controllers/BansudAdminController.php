<?php

namespace App\Http\Controllers;

use App\Models\BansudProfiles;
use App\Models\BansudEvent;
use App\Models\BansudAccReport;
use App\Models\BansudMonReport;
use App\Models\BansudAddOrganization;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BansudAdminController extends Controller
{
    public function bansudProfile(Request $request)
    {
        $bansud_profiles = DB::table('bansud_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bansud_profiles = $bansud_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }

        $bansud_profiles = $bansud_profiles->paginate(10);
        $bansud_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bansud.profile', compact('bansud_profiles'));
    }
    public function bansudDisapproved(Request $request)
    {
  
        return view('admin.bansud.disapproved');
    }
    public function bansudWaitList(Request $request)
    {
        
        return view('admin.bansud.waitlist');
    }
    public function bansud_create(Request $request)
    {
        
         return view('admin.bansud.add-org');
    }
    public function bansud_store(Request $request)
    {
        $data = new BansudAddOrganization( );  
        $data->id;
        $data->urn = $request->urn;
        $data->organization_name = $request->organization_name;
        $data->complete_address = $request->complete_address;
        $data->telephone_number = $request->telephone_number;
        $data->cellphone_number = $request->cellphone_number;
        $data->number_members = $request->number_members;
        $data->date_establish = $request->date_establish;
        $data->date_approved = $request->date_approved;
        $data->major_classification = $request->major_classification;
        $data->sub_classification = $request->sub_classification;
        $data->pydp_center = $request->pydp_center;
        $data->email_add = $request->email_add;
        $data->brief_description = $request->brief_description;
        $data->head_name = $request->head_name;
        $data->adviser_name = $request->adviser_name;
        $data->contact_number = $request->contact_number;
        $data->email_address = $request->email_address;
        $data->registration_file = $request->registration_file;
        $data->list_of_members_file = $request->list_of_members_file;
        $data->directory_file = $request->directory_file;
        $data->constitution_file = $request->constitution_file;
        $data->save();
       
       return redirect()->back()->with('message', 'Profile Successfully Saved!');
       
    }
   
    function bansudApproved(Request $request)
    {
        $bansapproved = BansudAddOrganization::all();
         return view('admin.bansud.approved', compact('bansapproved'));
    }
    public function bansud_viewOrg(Request $request, $id)
    {
        $bansapproved = BansudAddOrganization::all();
        $bansapproved = BansudAddOrganization::where('id', $id)->get();
         return view('admin.bansud.banview-org', compact('bansapproved'));
    }
    public function bansudExpired(Request $request)
    {
     return view('admin.bansud.expired');
    }
    public function profileBansud($id)
    {
        $profile = BansudProfiles::where('id', $id)->get();

        return view('admin.bansud.view-profile', compact('profile'));
    }

    public function bansudIncEvent()
    {
        $event = BansudEvent::all();
        return view('admin.bansud.inc-event', compact('event'));
    }

    public function saveBansudEvent(Request $request)
    {
        $data = new BansudEvent();
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

    public function deleteBansudEvent($id)
    {
        $event = BansudEvent::find($id);

        $event->delete();

        return redirect()->back()->with('message', 'Event Deleted!');
    }

    public function bansudPstEvent()
    {
        $event = BansudEvent::all();
        return view('admin.bansud.pst-event', compact('event'));
    }
    public function bansudTdsEvent()
    {
        $event = BansudEvent::all();
        
        return view('admin.bansud.todaysevent', compact('event'));
    }

    public function bansudInactive(Request $request)
    {
        $bansud_profiles = DB::table('bansud_profiles');

        $search = $request->input('users');

        // Search Name
        if ($search) {
            $bansud_profiles = $bansud_profiles->where(function ($query) use ($search) {
                $query->where('firstname', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename)"), 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(firstname, ' ', middlename, ' ', lastname)"), 'like', "%{$search}%");
            });
        }


        $bansud_profiles = $bansud_profiles->paginate(10);
        $bansud_profiles->appends(['users' => $search]); // Add search query to pagination links

        return view('admin.bansud.inactive', compact('bansud_profiles'));
    }

    public function bansudInactiveProfile($id)
    {
        $profile = BansudProfiles::where('id', $id)->get();

        return view('admin.bansud.view-inactive', compact('profile'));
    }


    public function bansudAccReport(Request $request)
    {
        $search = $request->input('file');
        $query = BansudAccReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bansud.accomplishment', compact('data'));
    }


    public function addBansudAcc(Request $request)
    {
        $data = new bansudAccReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (bansudAccReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Accomplishment Report Added!');
    }

    public function downloadBansudAcc($id, $municipality)
    {
        $data = BansudAccReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBansudAcc($id, $municipality)
    {
        $data = BansudAccReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }

    public function bansudMonReport(Request $request)
    {
        $search = $request->input('file');
        $query = BansudMonReport::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->latest('created_at')->paginate(12);

        return view('admin.bansud.monitoring', compact('data'));
    }


    public function addBansudMon(Request $request)
    {
        $data = new BansudMonReport();

        $data->name = $request->name;
        $data->municipality = $request->municipality;
        $file = $request->file;
        $filename = $data->name . '.' . $file->getClientOriginalExtension();
        $request->file->move('report', $filename);
        $data->file = $filename;

        // Check if a record with the same name already exists
        if (bansudMonReport::where('name', $data->name)->exists()) {
            return redirect()->back()->with('error', 'File with the same name already exists');
        }

        $data->save();

        return redirect()->back()->with('message', 'Monitoring Report Added!');
    }

    public function downloadBansudMon($id, $municipality)
    {
        $data = BansudMonReport::where('id', $id)->where('municipality', $municipality)->firstOrFail();
        $filepath = public_path('report/' . $data->file); // Assuming the files are stored in the public directory
        return response()->download($filepath);
    }

    public function deleteBansudMon($id, $municipality)
    {
        $data = BansudMonReport::where('id', $id)->where('municipality', $municipality)->first();
        $data->delete();
        return redirect()->back()->with('error', 'Report deleted!');
    }
}
