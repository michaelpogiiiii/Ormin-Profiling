<?php

namespace App\Http\Controllers;

use App\Models\BacoEvent;
use App\Models\BacoProfiles;
use App\Models\BansudEvent;
use App\Models\BansudProfiles;
use App\Models\BongabongEvent;
use App\Models\BongabongProfiles;
use App\Models\BulalacaoEvent;
use App\Models\BulalacaoProfiles;
use App\Models\CalapanEvent;
use App\Models\CalapanProfiles;
use App\Models\GloriaEvent;
use App\Models\GloriaProfiles;
use App\Models\MansalayEvent;
use App\Models\MansalayProfiles;
use App\Models\NaujanEvent;
use App\Models\NaujanProfiles;
use App\Models\PinamalayanEvent;
use App\Models\PinamalayanProfiles;
use App\Models\PolaEvent;
use App\Models\PolaProfiles;
use App\Models\PuertoEvent;
use App\Models\PuertoProfiles;
use App\Models\RoxasEvent;
use App\Models\RoxasProfiles;
use App\Models\TeodoroEvent;
use App\Models\TeodoroProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VicotoriaEvent;
use App\Models\VictoriaProfiles;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;


use App\Models\BacoAccReport;
use App\Models\BansudAccReport;
use App\Models\BongabongAccReport;
use App\Models\BulalacaoAccReport;
use App\Models\CalapanAccReport;
use App\Models\GloriaAccReport;
use App\Models\MansalayAccReport;
use App\Models\NaujanAccReport;
use App\Models\PolaAccReport;
use App\Models\PuertoAccReport;
use App\Models\PinamalayanAccReport;
use App\Models\RoxasAccReport;
use App\Models\SocorroAccReport;
use App\Models\TeodoroAccReport;
use App\Models\VictoriaAccReport;

use App\Models\BacoMonReport;
use App\Models\BansudMonReport;
use App\Models\BongabongMonReport;
use App\Models\BulalacaoMonReport;
use App\Models\CalapanMonReport;
use App\Models\GloriaMonReport;
use App\Models\MansalayMonReport;
use App\Models\NaujanMonReport;
use App\Models\PolaMonReport;
use App\Models\PuertoMonReport;
use App\Models\PinamalayanMonReport;
use App\Models\RoxasMonReport;
use App\Models\SocorroMonReport;
use App\Models\TeodoroMonReport;
use App\Models\VictoriaMonReport;
use App\Models\AddOrganization;



class AdminController extends Controller
{
  

    // Show All profiles
    public function create(Request $request)
    {
        
         return view('pydc.add-org');
    }
    public function store(Request $request)
    {


        $data = new AddOrganization( );  
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
    function Approved(Request $request)
    {
        $approved = AddOrganization::all();

         return view('pydc.approved', compact('approved'));

    }

    public function viewOrg(Request $request, $id)
    {
        $approved = AddOrganization::all();
        $approved = AddOrganization::where('id', $id)->get();
         return view('pydc.view-org', compact('approved'));
    }
   

    public function Waitlist(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $allProfiles = new Collection();
         return view('pydc.waitlist');
    }
    public function disApproved(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $allProfiles = new Collection();
         return view('pydc.disapproved');
    }
  
    public function Expired(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $allProfiles = new Collection();
     return view('pydc.expired');
    }
    
    public function adminProfile(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $allProfiles = new Collection();

        $allProfiles = $allProfiles->concat(BansudProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(BacoProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(BongabongProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(BulalacaoProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(CalapanProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(GloriaProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(MansalayProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(NaujanProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(PinamalayanProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(PolaProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(PuertoProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(RoxasProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(TeodoroProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());
        $allProfiles = $allProfiles->concat(VictoriaProfiles::whereRaw("DATEDIFF('$currentDate', bday) <= (30 * 365)")->get());


        $search = $request->input('users');
        $municipality = $request->input('municipal');


        $filteredProfiles = $allProfiles;
        $sortedProfiles = $allProfiles->sortBy('barangay');



        // Search Name
        if ($search) {
            $filteredProfiles = $sortedProfiles->filter(function ($profile) use ($search) {

                $xfullname = $profile->name . ' ' . $profile->middlename;
                $fullname = $profile->firstname . ' ' . $profile->middlename . ' ' . $profile->lastname;
                return stripos($profile->firstname, $search) !== false ||
                    stripos($xfullname, $search) !== false ||
                    stripos($fullname, $search) !== false;
            });
        }



        // Search Municipality
        if ($municipality) {
            $filteredProfiles = $sortedProfiles->filter(function ($profile) use ($municipality) {


                return stripos($profile->municipality, $municipality) !== false;
            });
        }

        $perPage = 10;
        $currentPage = $request->query('page', 1);
        $paginator = new LengthAwarePaginator(
            $filteredProfiles->forPage($currentPage, $perPage),
            $filteredProfiles->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return View::make('pydc.profile', compact('paginator', 'municipality'));
    }


    // Show All Admin
    public function municipalityUser()
    {
        $users = DB::table('users')
            ->whereIn('usertype', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16])
            ->paginate(5);

        return view('pydc.user_info', compact('users'));
    }

    // Create Admin
    public function userProfile(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email is already used!');
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->municipality = $request->municipality;
        $data->usertype = $request->usertype;

        $hashedPassword = Hash::make($request->password);
        $data->password = $hashedPassword;

        $data->save();

        return redirect()->back()->with('message', 'New User Added Successfully');
    }

    // View Inactive Profile
    public function inactiveProfile(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $allProfiles = new Collection();

        $allProfiles = $allProfiles->concat(BansudProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(BacoProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(BongabongProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(BulalacaoProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(CalapanProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(GloriaProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(MansalayProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(NaujanProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(PinamalayanProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(PolaProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(PuertoProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(RoxasProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(TeodoroProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());
        $allProfiles = $allProfiles->concat(VictoriaProfiles::whereRaw("DATEDIFF('$currentDate', bday) >= (31 * 365)")->get());

        $search = $request->input('users');
        $municipality = $request->input('municipal');


        $filteredProfiles = $allProfiles;


        // Search Name
        if ($search) {
            $filteredProfiles = $allProfiles->filter(function ($profile) use ($search) {

                $xfullname = $profile->name . ' ' . $profile->middlename;
                $fullname = $profile->firstname . ' ' . $profile->middlename . ' ' . $profile->lastname;
                return stripos($profile->firstname, $search) !== false ||
                    stripos($xfullname, $search) !== false ||
                    stripos($fullname, $search) !== false;
            });
        }



        // Search Municipality
        if ($municipality) {
            $filteredProfiles = $allProfiles->filter(function ($profile) use ($municipality) {


                return stripos($profile->municipality, $municipality) !== false;
            });
        }

        $perPage = 10;
        $currentPage = $request->query('page', 1);
        $paginator = new LengthAwarePaginator(
            $filteredProfiles->forPage($currentPage, $perPage),
            $filteredProfiles->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return View::make('pydc.inactive', compact('paginator'));
    }

    // View Profile
    public function viewProfile(Request $request, $firstname, $lastname, $municipality, $barangay)
    {
        $allProfiles = new Collection();

        $allProfiles = $allProfiles->concat(BansudProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(BacoProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(BongabongProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(BulalacaoProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(CalapanProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(GloriaProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(MansalayProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(NaujanProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(PinamalayanProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(PolaProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(PuertoProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(RoxasProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(TeodoroProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $allProfiles = $allProfiles->concat(VictoriaProfiles::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->where('barangay', $barangay)
            ->where('municipality', $municipality)
            ->get());

        $filteredProfiles = $allProfiles;

        return view('pydc.view-profile', compact('filteredProfiles'));
    }

    public function viewInactive(Request $request, $id, $municipality)
    {
        $allProfiles = new Collection();

        $allProfiles = $allProfiles->concat(BansudProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(BacoProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(BongabongProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(BulalacaoProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(CalapanProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(GloriaProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(MansalayProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(NaujanProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(PinamalayanProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(PolaProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(PuertoProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(RoxasProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(TeodoroProfiles::where('id', $id)->where('municipality', $municipality)->get());
        $allProfiles = $allProfiles->concat(VictoriaProfiles::where('id', $id)->where('municipality', $municipality)->get());

        $filteredProfiles = $allProfiles;

        $perPage = 4;
        $currentPage = $request->query('page', 1);
        $paginator = new LengthAwarePaginator(
            $filteredProfiles->forPage($currentPage, $perPage),
            $filteredProfiles->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return View::make('pydc.view-inactive', compact('paginator'));
    }

    public function deleteUser($id)
    {
        $data = User::find($id);
        $data->delete();


        return redirect()->back()->with('error', 'User deleted successfully!');
    }

    public function incomingEvent(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $inc_event = collect();

        $inc_event = $inc_event->concat(BansudEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(BacoEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(BongabongEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(BulalacaoEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(CalapanEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(GloriaEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(MansalayEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(NaujanEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(PinamalayanEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(PolaEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(PuertoEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(RoxasEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(TeodoroEvent::where('date', '>=', $currentDate)->get());
        $inc_event = $inc_event->concat(VicotoriaEvent::where('date', '>=', $currentDate)->get());

        $incoming_event = $inc_event;

        $municipality = $request->input('municipal');

        // Search Municipality
        if ($municipality) {
            $incoming_event = $inc_event->filter(function ($profile) use ($municipality) {


                return stripos($profile->municipality, $municipality) !== false;
            });
        }
        return view('pydc.upcoming', compact('incoming_event'));
    }

    public function deleteEvent($id, $municipality)
    {
        $inc_event = collect();
        $inc_event = $inc_event->concat(BansudEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BacoEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BongabongEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BulalacaoEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(CalapanEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(GloriaEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(MansalayEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(NaujanEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PinamalayanEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PolaEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PuertoEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(RoxasEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(TeodoroEvent::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(VicotoriaEvent::where('id', $id)->where('municipality', $municipality)->get());

        $inc_event->each(function ($event) {
            $event->delete();
        });

        return redirect()->back()->with('error', 'Event Successfully Deleted!');
    }

    public function pastEvent(Request $request)
    {
        $currentDate = Carbon::now('Asia/Manila')->toDateString();
        $pst_event = collect();

        $pst_event = $pst_event->concat(BansudEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(BacoEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(BongabongEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(BulalacaoEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(CalapanEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(GloriaEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(MansalayEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(NaujanEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(PinamalayanEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(PolaEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(PuertoEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(RoxasEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(TeodoroEvent::where('date', '<', $currentDate)->get());
        $pst_event = $pst_event->concat(VicotoriaEvent::where('date', '<', $currentDate)->get());

        $past_event = $pst_event;

        $municipality = $request->input('municipal');

        // Search Municipality
        if ($municipality) {
            $past_event = $pst_event->filter(function ($profile) use ($municipality) {
                return stripos($profile->municipality, $municipality) !== false;
            });
        }

        return view('pydc.past', compact('past_event'));
    }

    // public function accReport(Request $request)
    // {

    //     $reports = [
    //         BansudAccReport::class,
    //         BacoAccReport::class,
    //         BongabongAccReport::class,
    //         BulalacaoAccReport::class,
    //         CalapanAccReport::class,
    //         GloriaAccReport::class,
    //         MansalayAccReport::class,
    //         NaujanAccReport::class,
    //         PinamalayanAccReport::class,
    //         PolaAccReport::class,
    //         PuertoAccReport::class,
    //         RoxasAccReport::class,
    //         SocorroAccReport::class,
    //         TeodoroAccReport::class,
    //         VictoriaAccReport::class
    //     ];

    //     $allReports = new Collection();

    //     foreach ($reports as $report) {
    //         $allReports = $allReports->concat($report::all());
    //     }


    //     $filteredReports = $allReports;

    //     $search = $request->input('file');
    //     $municipality = $request->input('municipal');

    //     // Search Name
    //     if ($search) {
    //         $filteredReports = $allReports->filter(function ($profile) use ($search) {

    //             $xfullname = $profile->name;
    //             // $fullname = $profile->firstname . ' ' . $profile->middlename . ' ' . $profile->lastname;
    //             return stripos($profile->$xfullname, $search) !== false;
    //             // ||
    //             //     stripos($xfullname, $search) !== false ||
    //             //     stripos($fullname, $search) !== false;
    //         });
    //     }



    //     // Search Municipality
    //     if ($municipality) {
    //         $filteredReports = $allReports->filter(function ($profile) use ($municipality) {


    //             return stripos($profile->municipality, $municipality) !== false;
    //         });
    //     }

    //     $perPage = 4;
    //     $currentPage = $request->query('page', 1);
    //     $paginator = new LengthAwarePaginator(
    //         $filteredReports->forPage($currentPage, $perPage),
    //         $filteredReports->count(),
    //         $perPage,
    //         $currentPage,
    //         ['path' => $request->url(), 'query' => $request->query()]
    //     );
    //    return view('pydc.accomplishment', compact('paginator'));
   // }

    public function accReport(Request $request)
    {
        $reports = [
            BansudAccReport::class,
            BacoAccReport::class,
            BongabongAccReport::class,
            BulalacaoAccReport::class,
            CalapanAccReport::class,
            GloriaAccReport::class,
            MansalayAccReport::class,
            NaujanAccReport::class,
            PinamalayanAccReport::class,
            PolaAccReport::class,
            PuertoAccReport::class,
            RoxasAccReport::class,
            SocorroAccReport::class,
            TeodoroAccReport::class,
            VictoriaAccReport::class
        ];

        $allReports = new Collection();

        foreach ($reports as $report) {
            $allReports = $allReports->concat($report::all());
        }

        $search = $request->input('file');
        $municipality = $request->input('municipal');

        // Search Name
        if ($search) {
            $filteredReports = $allReports->filter(function ($profile) use ($search) {
                $xfullname = $profile->name;
                return stripos($profile->$xfullname, $search) !== false;
            });
        } else {
            $filteredReports = $allReports;
        }

        // Search Municipality
        if ($municipality) {
            $filteredReports = $filteredReports->filter(function ($profile) use ($municipality) {
                return stripos($profile->municipality, $municipality) !== false;
            });
        }

        $filteredReports = $filteredReports->sortByDesc('created_at');

        $perPage = 12;
        $currentPage = $request->query('page', 1);
        $paginator = new LengthAwarePaginator(
            $filteredReports->forPage($currentPage, $perPage),
            $filteredReports->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pydc.accomplishment', compact('paginator'));
    }


    public function deleteAcc($id, $municipality)
    {
        $inc_event = collect();
        $inc_event = $inc_event->concat(BansudAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BacoAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BongabongAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BulalacaoAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(CalapanAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(GloriaAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(MansalayAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(NaujanAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PinamalayanAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PolaAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PuertoAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(RoxasAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(SocorroAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(TeodoroAccReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(VictoriaAccReport::where('id', $id)->where('municipality', $municipality)->get());

        $inc_event->each(function ($event) {
            $event->delete();
        });

        return redirect()->back()->with('error', 'Report Deleted!');
    }

    public function downloadAcc($id, $municipality)
    {
        $inc_event = collect();

        $reports = [
            BansudAccReport::class,
            BacoAccReport::class,
            BongabongAccReport::class,
            BulalacaoAccReport::class,
            CalapanAccReport::class,
            GloriaAccReport::class,
            MansalayAccReport::class,
            NaujanAccReport::class,
            PinamalayanAccReport::class,
            PolaAccReport::class,
            PuertoAccReport::class,
            RoxasAccReport::class,
            TeodoroAccReport::class,
            VictoriaAccReport::class
           
        ];

        foreach ($reports as $report) {
            $inc_event = $inc_event->union($report::where('id', $id)->where('municipality', $municipality)->get());
        }

        if ($inc_event->isNotEmpty()) {
            $event = $inc_event->first(); // Assuming you want to download the file from the first report

            $filepath = public_path('report/' . $event->file); // Assuming the files are stored in the public directory

            return response()->download($filepath);
        }

        // Handle the case where $inc_event is empty (no matching reports found)

    }

    // public function monReport(Request $request)
    // {
    //     $reports = [
    //         BansudMonReport::class,
    //         BacoMonReport::class,
    //         BongabongMonReport::class,
    //         BulalacaoMonReport::class,
    //         CalapanMonReport::class,
    //         GloriaMonReport::class,
    //         MansalayMonReport::class,
    //         NaujanMonReport::class,
    //         PinamalayanMonReport::class,
    //         PolaMonReport::class,
    //         PuertoMonReport::class,
    //         RoxasMonReport::class,
    //         SocorroMonReport::class,
    //         TeodoroMonReport::class,
    //         VictoriaMonReport::class
    //     ];

    //     $allReports = new Collection();

    //     foreach ($reports as $report) {
    //         $allReports = $allReports->concat($report::all());
    //     }

    //     $filteredReports = $allReports;

    //     $search = $request->input('file');
    //     $municipality = $request->input('municipal');

    //     // Search Name
    //     if ($search) {
    //         $filteredReports = $allReports->filter(function ($profile) use ($search) {
    //             $xfullname = $profile->name;
    //             return stripos($profile->$xfullname, $search) !== false;
    //         });
    //     }

    //     // Search Municipality
    //     if ($municipality) {
    //         $filteredReports = $allReports->filter(function ($profile) use ($municipality) {
    //             return stripos($profile->municipality, $municipality) !== false;
    //         });
    //     }

    //     $perPage = 4;
    //     $currentPage = $request->query('page', 1);
    //     $paginator = new LengthAwarePaginator(
    //         $filteredReports->forPage($currentPage, $perPage),
    //         $filteredReports->count(),
    //         $perPage,
    //         $currentPage,
    //         ['path' => $request->url(), 'query' => $request->query()]
    //     );

    //     return view('pydc.monitoring', compact('paginator'));
    // }
    public function monReport(Request $request)
    {
        $reports = [
            BansudMonReport::class,
            BacoMonReport::class,
            BongabongMonReport::class,
            BulalacaoMonReport::class,
            CalapanMonReport::class,
            GloriaMonReport::class,
            MansalayMonReport::class,
            NaujanMonReport::class,
            PinamalayanMonReport::class,
            PolaMonReport::class,
            PuertoMonReport::class,
            RoxasMonReport::class,
            SocorroMonReport::class,
            TeodoroMonReport::class,
            VictoriaMonReport::class
        ];

        $allReports = new Collection();

        foreach ($reports as $report) {
            $allReports = $allReports->concat($report::all());
        }

        $search = $request->input('file');
        $municipality = $request->input('municipal');

        // Search Name
        if ($search) {
            $filteredReports = $allReports->filter(function ($profile) use ($search) {
                $xfullname = $profile->name;
                return stripos($profile->$xfullname, $search) !== false;
            });
        } else {
            $filteredReports = $allReports;
        }

        // Search Municipality
        if ($municipality) {
            $filteredReports = $filteredReports->filter(function ($profile) use ($municipality) {
                return stripos($profile->municipality, $municipality) !== false;
            });
        }

        $filteredReports = $filteredReports->sortByDesc('created_at');

        $perPage = 12;
        $currentPage = $request->query('page', 1);
        $paginator = new LengthAwarePaginator(
            $filteredReports->forPage($currentPage, $perPage),
            $filteredReports->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pydc.monitoring', compact('paginator'));
    }


    public function deleteMon($id, $municipality)
    {
        $inc_event = collect();

        $inc_event = $inc_event->concat(BansudMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BacoMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BongabongMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(BulalacaoMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(CalapanMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(GloriaMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(MansalayMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(NaujanMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PinamalayanMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PolaMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(PuertoMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(RoxasMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(SocorroMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(TeodoroMonReport::where('id', $id)->where('municipality', $municipality)->get());
        $inc_event = $inc_event->concat(VictoriaMonReport::where('id', $id)->where('municipality', $municipality)->get());

        $inc_event->each(function ($event) {
            $event->delete();
        });

        return redirect()->back()->with('error', 'Report Deleted!');
    }

    public function downloadMon($id, $municipality)
    {
        $inc_event = collect();

        $reports = [
            BansudMonReport::class,
            BacoMonReport::class,
            BongabongMonReport::class,
            BulalacaoMonReport::class,
            CalapanMonReport::class,
            GloriaMonReport::class,
            MansalayMonReport::class,
            NaujanMonReport::class,
            PinamalayanMonReport::class,
            PolaMonReport::class,
            PuertoMonReport::class,
            RoxasMonReport::class,
            TeodoroMonReport::class,
            VictoriaMonReport::class
        ];

        foreach ($reports as $report) {
            $inc_event = $inc_event->union($report::where('id', $id)->where('municipality', $municipality)->get());
        }

        if ($inc_event->isNotEmpty()) {
            $event = $inc_event->first(); // Assuming you want to download the file from the first report
            $filepath = public_path('report/' . $event->file); // Assuming the files are stored in the public directory
            return response()->download($filepath);
        }

        // Handle the case where $inc_event is empty (no matching reports found)
    }
}
