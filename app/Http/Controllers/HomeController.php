<?php

namespace App\Http\Controllers;

use App\Models\BacoAccReport;
use App\Models\BacoEvent;
use App\Models\BacoMonReport;
use App\Models\BansudEvent;
use App\Models\BansudProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use App\Models\BacoProfiles;
use App\Models\BansudAccReport;
use App\Models\BansudMonReport;
use App\Models\BongabongAccReport;
use App\Models\BongabongEvent;
use App\Models\BongabongMonReport;
use App\Models\BongabongProfiles;
use App\Models\BulalacaoAccReport;
use App\Models\BulalacaoEvent;
use App\Models\BulalacaoMonReport;
use App\Models\BulalacaoProfiles;
use App\Models\CalapanAccReport;
use App\Models\CalapanEvent;
use App\Models\CalapanMonReport;
use App\Models\CalapanProfiles;
use App\Models\GloriaAccReport;
use App\Models\GloriaEvent;
use App\Models\GloriaMonReport;
use App\Models\GloriaProfiles;
use App\Models\MansalayAccReport;
use App\Models\MansalayEvent;
use App\Models\MansalayMonReport;
use App\Models\MansalayProfiles;
use App\Models\NaujanAccReport;
use App\Models\NaujanEvent;
use App\Models\NaujanMonReport;
use App\Models\NaujanProfiles;
use App\Models\PinamalayanAccReport;
use App\Models\PinamalayanEvent;
use App\Models\PinamalayanMonReport;
use App\Models\PinamalayanProfiles;
use App\Models\PolaAccReport;
use App\Models\PolaEvent;
use App\Models\PolaMonReport;
use App\Models\PolaProfiles;
use App\Models\PuertoAccReport;
use App\Models\PuertoEvent;
use App\Models\PuertoMonReport;
use App\Models\PuertoProfiles;
use App\Models\RoxasAccReport;
use App\Models\RoxasEvent;
use App\Models\RoxasMonReport;
use App\Models\RoxasProfiles;
use App\Models\SocorroAccReport;
use App\Models\SocorroEvent;
use App\Models\SocorroMonReport;
use App\Models\SocorroProfiles;
use App\Models\TeodoroAccReport;
use App\Models\TeodoroEvent;
use App\Models\TeodoroMonReport;
use App\Models\TeodoroProfiles;
use App\Models\VicotoriaEvent;
use App\Models\VictoriaAccReport;
use App\Models\VictoriaMonReport;
use App\Models\VictoriaProfiles;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::id()) {
            //Admin Dashboard
            if (Auth::user()->usertype == '1') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $allProfiles = collect();

                $allProfiles = $allProfiles->concat(BansudProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(BacoProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(BongabongProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(BulalacaoProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(CalapanProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(GloriaProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(MansalayProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(NaujanProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(PinamalayanProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(PolaProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(PuertoProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(RoxasProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(TeodoroProfiles::where('age', '<', 31)->get());
                $allProfiles = $allProfiles->concat(VictoriaProfiles::where('age', '<', 31)->get());

                $inactive_profiles = collect();

                $inactive_profiles = $inactive_profiles->concat(BansudProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(BacoProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(BongabongProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(BulalacaoProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(CalapanProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(GloriaProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(MansalayProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(NaujanProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(PinamalayanProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(PolaProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(PuertoProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(RoxasProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(TeodoroProfiles::where('age', '>', 30)->get());
                $inactive_profiles = $inactive_profiles->concat(VictoriaProfiles::where('age', '>', 30)->get());

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
                $inc_event = $inc_event->concat(SocorroEvent::where('date', '>=', $currentDate)->get());
                $inc_event = $inc_event->concat(TeodoroEvent::where('date', '>=', $currentDate)->get());
                $inc_event = $inc_event->concat(VicotoriaEvent::where('date', '>=', $currentDate)->get());

                $past_event = collect();

                $past_event = $past_event->concat(BansudEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(BacoEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(BongabongEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(BulalacaoEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(CalapanEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(GloriaEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(MansalayEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(NaujanEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(PinamalayanEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(PolaEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(PuertoEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(RoxasEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(TeodoroEvent::where('date', '<', $currentDate)->get());
                $past_event = $past_event->concat(VicotoriaEvent::where('date', '<', $currentDate)->get());

                $bansudActive = BansudProfiles::where('age', '<', '31')->count();
                $bacoActive = BacoProfiles::where('age', '<', '31')->count();
                $bongabongActive = BongabongProfiles::where('age', '<', '31')->count();
                $bulalacaoActive = BulalacaoProfiles::where('age', '<', '31')->count();
                $calapanActive = CalapanProfiles::where('age', '<', '31')->count();
                $gloriaActive = GloriaProfiles::where('age', '<', '31')->count();
                $mansalayActive = MansalayProfiles::where('age', '<', '31')->count();
                $naujanActive = NaujanProfiles::where('age', '<', '31')->count();
                $pinamalayanActive = PinamalayanProfiles::where('age', '<', '31')->count();
                $polaActive = PolaProfiles::where('age', '<', '31')->count();
                $puertoActive = PuertoProfiles::where('age', '<', '31')->count();
                $roxasActive = RoxasProfiles::where('age', '<', '31')->count();
                $socorroActive = SocorroProfiles::where('age', '<', '31')->count();
                $teodoroActive = TeodoroProfiles::where('age', '<', '31')->count();
                $victoriaActive = VictoriaProfiles::where('age', '<', '31')->count();

                $bansudInactive = BansudProfiles::where('age', '>', '30')->count();
                $bacoInactive = BacoProfiles::where('age', '>', '30')->count();
                $bongabongInactive = BongabongProfiles::where('age', '>', '30')->count();
                $bulalacaoInactive = BulalacaoProfiles::where('age', '>', '30')->count();
                $calapanInactive = CalapanProfiles::where('age', '>', '30')->count();
                $gloriaInactive = GloriaProfiles::where('age', '>', '30')->count();
                $mansalayInactive = MansalayProfiles::where('age', '>', '30')->count();
                $naujanInactive = NaujanProfiles::where('age', '>', '30')->count();
                $pinamalayanInactive = PinamalayanProfiles::where('age', '>', '30')->count();
                $polaInactive = PolaProfiles::where('age', '>', '30')->count();
                $puertoInactive = PuertoProfiles::where('age', '>', '30')->count();
                $roxasInactive = RoxasProfiles::where('age', '>', '30')->count();
                $socorroInactive = SocorroProfiles::where('age', '>', '30')->count();
                $teodoroInactive = TeodoroProfiles::where('age', '>', '30')->count();
                $victoriaInactive = VictoriaProfiles::where('age', '>', '30')->count();

                $bansud_inc = BansudEvent::where('date', '>=', $currentDate)->count();
                $baco_inc = BacoEvent::where('date', '>=', $currentDate)->count();
                $bongabong_inc = BongabongEvent::where('date', '>=', $currentDate)->count();
                $bulalacao_inc = BulalacaoEvent::where('date', '>=', $currentDate)->count();
                $calapan_inc = CalapanEvent::where('date', '>=', $currentDate)->count();
                $gloria_inc = GloriaEvent::where('date', '>=', $currentDate)->count();
                $mansalay_inc = MansalayEvent::where('date', '>=', $currentDate)->count();
                $naujan_inc = NaujanEvent::where('date', '>=', $currentDate)->count();
                $pinamalayan_inc = PinamalayanEvent::where('date', '>=', $currentDate)->count();
                $pola_inc = PolaEvent::where('date', '>=', $currentDate)->count();
                $puerto_inc = PuertoEvent::where('date', '>=', $currentDate)->count();
                $roxas_inc = RoxasEvent::where('date', '>=', $currentDate)->count();
                $socorro_inc = SocorroEvent::where('date', '>=', $currentDate)->count();
                $teodoro_inc = TeodoroEvent::where('date', '>=', $currentDate)->count();
                $victoria_inc = VicotoriaEvent::where('date', '>=', $currentDate)->count();

                $bansud_pst = BansudEvent::where('date', '<', $currentDate)->count();
                $baco_pst = BacoEvent::where('date', '<', $currentDate)->count();
                $bongabong_pst = BongabongEvent::where('date', '<', $currentDate)->count();
                $bulalacao_pst = BulalacaoEvent::where('date', '<', $currentDate)->count();
                $calapan_pst = CalapanEvent::where('date', '<', $currentDate)->count();
                $gloria_pst = GloriaEvent::where('date', '<', $currentDate)->count();
                $mansalay_pst = MansalayEvent::where('date', '<', $currentDate)->count();
                $naujan_pst = NaujanEvent::where('date', '<', $currentDate)->count();
                $pinamalayan_pst = PinamalayanEvent::where('date', '<', $currentDate)->count();
                $pola_pst = PolaEvent::where('date', '<', $currentDate)->count();
                $puerto_pst = PuertoEvent::where('date', '<', $currentDate)->count();
                $roxas_pst = RoxasEvent::where('date', '<', $currentDate)->count();
                $socorro_pst = SocorroEvent::where('date', '<', $currentDate)->count();
                $teodoro_pst = TeodoroEvent::where('date', '<', $currentDate)->count();
                $victoria_pst = VicotoriaEvent::where('date', '<', $currentDate)->count();

                $bansud_acc = BansudAccReport::all()->count();
                $baco_acc = BacoAccReport::all()->count();
                $bongabong_acc = BongabongAccReport::all()->count();
                $bulalacao_acc = BulalacaoAccReport::all()->count();
                $calapan_acc = CalapanAccReport::all()->count();
                $gloria_acc = GloriaAccReport::all()->count();
                $mansalay_acc = MansalayAccReport::all()->count();
                $naujan_acc = NaujanAccReport::all()->count();
                $pinamalayan_acc = PinamalayanAccReport::all()->count();
                $pola_acc = PolaAccReport::all()->count();
                $puerto_acc = PuertoAccReport::all()->count();
                $roxas_acc = RoxasAccReport::all()->count();
                $socorro_acc = SocorroAccReport::all()->count();
                $teodoro_acc = TeodoroAccReport::all()->count();
                $victoria_acc = VictoriaAccReport::all()->count();

                $bansud_mon = BansudMonReport::all()->count();
                $baco_mon = BacoMonReport::all()->count();
                $bongabong_mon = BongabongMonReport::all()->count();
                $bulalacao_mon = BulalacaoMonReport::all()->count();
                $calapan_mon = CalapanMonReport::all()->count();
                $gloria_mon = GloriaMonReport::all()->count();
                $mansalay_mon = MansalayMonReport::all()->count();
                $naujan_mon = NaujanMonReport::all()->count();
                $pinamalayan_mon = PinamalayanMonReport::all()->count();
                $pola_mon = PolaMonReport::all()->count();
                $puerto_mon = PuertoMonReport::all()->count();
                $roxas_mon = RoxasMonReport::all()->count();
                $socorro_mon = SocorroMonReport::all()->count();
                $teodoro_mon = TeodoroMonReport::all()->count();
                $victoria_mon = VictoriaMonReport::all()->count();





                $total_acc = $bansud_acc + $baco_acc + $bongabong_acc + $bulalacao_acc + $calapan_acc + $gloria_acc + $mansalay_acc + $naujan_acc + $pinamalayan_acc + $pola_acc + $puerto_acc + $roxas_acc + $socorro_acc + $teodoro_acc + $victoria_acc;
                $total_mon = $bansud_mon + $baco_mon + $bongabong_mon + $bulalacao_mon + $calapan_mon + $gloria_mon + $mansalay_mon + $naujan_mon + $pinamalayan_mon + $pola_mon + $puerto_mon + $roxas_mon + $socorro_mon + $teodoro_mon + $victoria_mon;

                $pst_event = $past_event->count();
                $incoming_event = $inc_event->count();
                $inactive_profiles = $inactive_profiles->count();
                $active_profiles = $allProfiles->count();
                return view('pydc.home', compact(
                    'total_acc',
                    'total_mon',
                    'active_profiles',
                    'inactive_profiles',
                    'incoming_event',
                    'pst_event',
                    'bansudActive',
                    'bacoActive',
                    'bongabongActive',
                    'bulalacaoActive',
                    'calapanActive',
                    'gloriaActive',
                    'mansalayActive',
                    'naujanActive',
                    'pinamalayanActive',
                    'polaActive',
                    'puertoActive',
                    'roxasActive',
                    'socorroActive',
                    'teodoroActive',
                    'victoriaActive',
                    'bansudInactive',
                    'bacoInactive',
                    'bongabongInactive',
                    'bulalacaoInactive',
                    'calapanInactive',
                    'gloriaInactive',
                    'mansalayInactive',
                    'naujanInactive',
                    'pinamalayanInactive',
                    'polaInactive',
                    'puertoInactive',
                    'roxasInactive',
                    'socorroInactive',
                    'teodoroInactive',
                    'victoriaInactive',
                    'bansud_pst',
                    'baco_pst',
                    'bongabong_pst',
                    'bulalacao_pst',
                    'calapan_pst',
                    'gloria_pst',
                    'mansalay_pst',
                    'naujan_pst',
                    'pinamalayan_pst',
                    'pola_pst',
                    'puerto_pst',
                    'roxas_pst',
                    'socorro_pst',
                    'teodoro_pst',
                    'victoria_pst',
                    'bansud_inc',
                    'baco_inc',
                    'bongabong_inc',
                    'bulalacao_inc',
                    'calapan_inc',
                    'gloria_inc',
                    'mansalay_inc',
                    'naujan_inc',
                    'pinamalayan_inc',
                    'pola_inc',
                    'puerto_inc',
                    'roxas_inc',
                    'socorro_inc',
                    'teodoro_inc',
                    'victoria_inc',
                    'bansud_acc',
                    'baco_acc',
                    'bongabong_acc',
                    'bulalacao_acc',
                    'calapan_acc',
                    'gloria_acc',
                    'mansalay_acc',
                    'naujan_acc',
                    'pinamalayan_acc',
                    'pola_acc',
                    'puerto_acc',
                    'roxas_acc',
                    'socorro_acc',
                    'teodoro_acc',
                    'victoria_acc',
                    'bansud_mon',
                    'baco_mon',
                    'bongabong_mon',
                    'bulalacao_mon',
                    'calapan_mon',
                    'gloria_mon',
                    'mansalay_mon',
                    'naujan_mon',
                    'pinamalayan_mon',
                    'pola_mon',
                    'puerto_mon',
                    'roxas_mon',
                    'socorro_mon',
                    'teodoro_mon',
                    'victoria_mon'
                ));
            } elseif (Auth::user()->usertype == '2') {
                $acc = BacoAccReport::all()->count();
                $mon = BacoMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = BacoEvent::where('date', '>=', $currentDate)->count();
                $event_pst = BacoEvent::where('date', '<', $currentDate)->count();
                $active_profile = BacoProfiles::where('age', '<', '31')->count();
                $inc_profile  = BacoProfiles::where('age', '>', '30')->count();
                return view('admin.baco.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '3') {
                $acc = BansudAccReport::all()->count();
                $mon = BansudMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = BansudEvent::where('date', '>=', $currentDate)->count();
                $event_pst = BansudEvent::where('date', '<', $currentDate)->count();
                $active_profile = BansudProfiles::where('age', '<', '31')->count();
                $inc_profile  = BansudProfiles::where('age', '>', '30')->count();
                return view('admin.bansud.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '4') {
                $acc = BongabongAccReport::all()->count();
                $mon = BongabongMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = BongabongEvent::where('date', '>=', $currentDate)->count();
                $event_pst = BongabongEvent::where('date', '<', $currentDate)->count();
                $active_profile = BongabongProfiles::where('age', '<', '31')->count();
                $inc_profile  = BongabongProfiles::where('age', '>', '30')->count();
                return view('admin.bongabong.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '5') {
                $acc = BulalacaoAccReport::all()->count();
                $mon = BulalacaoMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = BulalacaoEvent::where('date', '>=', $currentDate)->count();
                $event_pst = BulalacaoEvent::where('date', '<', $currentDate)->count();
                $active_profile = BulalacaoProfiles::where('age', '<', '31')->count();
                $inc_profile  = BulalacaoProfiles::where('age', '>', '30')->count();
                return view('admin.bulalacao.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '6') {
                $acc = CalapanAccReport::all()->count();
                $mon = CalapanMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = CalapanEvent::where('date', '>=', $currentDate)->count();
                $event_pst = CalapanEvent::where('date', '<', $currentDate)->count();
                $active_profile = CalapanProfiles::where('age', '<', '31')->count();
                $inc_profile  = CalapanProfiles::where('age', '>', '30')->count();
                return view('admin.calapan.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '7') {
                $acc = GloriaAccReport::all()->count();
                $mon = GloriaMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = GloriaEvent::where('date', '>=', $currentDate)->count();
                $event_pst = GloriaEvent::where('date', '<', $currentDate)->count();
                $active_profile = GloriaProfiles::where('age', '<', '31')->count();
                $inc_profile  = GloriaProfiles::where('age', '>', '30')->count();
                return view('admin.gloria.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '8') {
                $acc = MansalayAccReport::all()->count();
                $mon = MansalayMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = MansalayEvent::where('date', '>=', $currentDate)->count();
                $event_pst = MansalayEvent::where('date', '<', $currentDate)->count();
                $active_profile = MansalayProfiles::where('age', '<', '31')->count();
                $inc_profile  = MansalayProfiles::where('age', '>', '30')->count();
                return view('admin.mansalay.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '9') {
                $acc = NaujanAccReport::all()->count();
                $mon = NaujanMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = NaujanEvent::where('date', '>=', $currentDate)->count();
                $event_pst = NaujanEvent::where('date', '<', $currentDate)->count();
                $active_profile = NaujanProfiles::where('age', '<', '31')->count();
                $inc_profile  = NaujanProfiles::where('age', '>', '30')->count();
                return view('admin.naujan.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '10') {
                $acc = PinamalayanAccReport::all()->count();
                $mon = PinamalayanMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = PinamalayanEvent::where('date', '>=', $currentDate)->count();
                $event_pst = PinamalayanEvent::where('date', '<', $currentDate)->count();
                $active_profile = PinamalayanProfiles::where('age', '<', '31')->count();
                $inc_profile  = PinamalayanProfiles::where('age', '>', '30')->count();
                return view('admin.pinamalayan.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '11') {
                $acc = PolaAccReport::all()->count();
                $mon = PolaMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = PolaEvent::where('date', '>=', $currentDate)->count();
                $event_pst = PolaEvent::where('date', '<', $currentDate)->count();
                $active_profile = PolaProfiles::where('age', '<', '31')->count();
                $inc_profile  = PolaProfiles::where('age', '>', '30')->count();
                return view('admin.pola.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '12') {
                $acc = PuertoAccReport::all()->count();
                $mon = PuertoMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = PuertoEvent::where('date', '>=', $currentDate)->count();
                $event_pst = PuertoEvent::where('date', '<', $currentDate)->count();
                $active_profile = PuertoProfiles::where('age', '<', '31')->count();
                $inc_profile  = PuertoProfiles::where('age', '>', '30')->count();
                return view('admin.puerto.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '13') {
                $acc = RoxasAccReport::all()->count();
                $mon = RoxasMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = RoxasEvent::where('date', '>=', $currentDate)->count();
                $event_pst = RoxasEvent::where('date', '<', $currentDate)->count();
                $active_profile = RoxasProfiles::where('age', '<', '31')->count();
                $inc_profile  = RoxasProfiles::where('age', '>', '30')->count();
                return view('admin.roxas.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '14') {
                $acc = TeodoroAccReport::all()->count();
                $mon = TeodoroMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = TeodoroEvent::where('date', '>=', $currentDate)->count();
                $event_pst = TeodoroEvent::where('date', '<', $currentDate)->count();
                $active_profile = TeodoroProfiles::where('age', '<', '31')->count();
                $inc_profile  = TeodoroProfiles::where('age', '>', '30')->count();
                return view('admin.teodoro.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '15') {
                $acc = SocorroAccReport::all()->count();
                $mon = SocorroMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = SocorroEvent::where('date', '>=', $currentDate)->count();
                $event_pst = SocorroEvent::where('date', '<', $currentDate)->count();
                $active_profile = SocorroProfiles::where('age', '<', '31')->count();
                $inc_profile  = SocorroProfiles::where('age', '>', '30')->count();
                return view('admin.socorro.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            } elseif (Auth::user()->usertype == '16') {
                $acc = VictoriaAccReport::all()->count();
                $mon = VictoriaMonReport::all()->count();
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $event_inc = VicotoriaEvent::where('date', '>=', $currentDate)->count();
                $event_pst = VicotoriaEvent::where('date', '<', $currentDate)->count();
                $active_profile = VictoriaProfiles::where('age', '<', '31')->count();
                $inc_profile  = VictoriaProfiles::where('age', '>', '30')->count();
                return view('admin.victoria.home', compact('event_inc', 'event_pst', 'active_profile', 'inc_profile', 'mon', 'acc'));
            }


            //user dashboard
            elseif (Auth::user()->municipality == 'Baco' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = BacoEvent::where('date', '>=', $currentDate)->get();
                $data2 = BacoEvent::where('date', '<', $currentDate)->get();
                return view('user.baco.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Bansud' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = BansudEvent::where('date', '>=', $currentDate)->get();
                $data2 = BansudEvent::where('date', '<', $currentDate)->get();
                return view('user.bansud.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Bongabong' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = BongabongEvent::where('date', '>=', $currentDate)->get();
                $data2 = BongabongEvent::where('date', '<', $currentDate)->get();
                return view('user.bongabong.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Bulalacao' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = BulalacaoEvent::where('date', '>=', $currentDate)->get();
                $data2 = BulalacaoEvent::where('date', '<', $currentDate)->get();
                return view('user.bulalacao.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Calapan City' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = CalapanEvent::where('date', '>=', $currentDate)->get();
                $data2 = CalapanEvent::where('date', '<', $currentDate)->get();
                return view('user.calapan.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Gloria' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = GloriaEvent::where('date', '>=', $currentDate)->get();
                $data2 = GloriaEvent::where('date', '<', $currentDate)->get();
                return view('user.gloria.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Mansalay' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = MansalayEvent::where('date', '>=', $currentDate)->get();
                $data2 = MansalayEvent::where('date', '<', $currentDate)->get();
                return view('user.mansalay.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Naujan' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = NaujanEvent::where('date', '>=', $currentDate)->get();
                $data2 = NaujanEvent::where('date', '<', $currentDate)->get();
                return view('user.naujan.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Pinamalayan' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = PinamalayanEvent::where('date', '>=', $currentDate)->get();
                $data2 = PinamalayanEvent::where('date', '<', $currentDate)->get();
                return view('user.pinamalayan.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Pola' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = PolaEvent::where('date', '>=', $currentDate)->get();
                $data2 = PolaEvent::where('date', '<', $currentDate)->get();
                return view('user.pola.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Puerto Galera' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = PuertoEvent::where('date', '>=', $currentDate)->get();
                $data2 = PuertoEvent::where('date', '<', $currentDate)->get();
                return view('user.puerto.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Roxas' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = RoxasEvent::where('date', '>=', $currentDate)->get();
                $data2 = RoxasEvent::where('date', '<', $currentDate)->get();
                return view('user.roxas.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'San Teodoro' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = TeodoroEvent::where('date', '>=', $currentDate)->get();
                $data2 = TeodoroEvent::where('date', '<', $currentDate)->get();
                return view('user.teodoro.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Socorro' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = SocorroEvent::where('date', '>=', $currentDate)->get();
                $data2 = SocorroEvent::where('date', '<', $currentDate)->get();
                return view('user.socorro.home', compact('data', 'data2'));
            } elseif (Auth::user()->municipality == 'Victoria' && Auth::user()->usertype == '0') {
                $currentDate = Carbon::now('Asia/Manila')->toDateString();
                $data = VicotoriaEvent::where('date', '>=', $currentDate)->get();
                $data2 = VicotoriaEvent::where('date', '<', $currentDate)->get();
                return view('user.victoria.home', compact('data', 'data2'));
            }
        } else {
            return view('dashboard');
        }
    }


    public function index()
    {
        if (auth()->check()) {
            return redirect('/home');
        } else {
            return view('dashboard');
        }
    }
}
