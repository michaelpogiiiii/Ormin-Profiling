<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//SuperAdmin
use App\Http\Controllers\AdminController;

//User
use App\Http\Controllers\BacoController;
use App\Http\Controllers\BansudController;
use App\Http\Controllers\BongabongController;
use App\Http\Controllers\BulalacaoController;
use App\Http\Controllers\CalapanController;
use App\Http\Controllers\GloriaController;
use App\Http\Controllers\MansalayController;
use App\Http\Controllers\NaujanController;
use App\Http\Controllers\PinamalayanController;
use App\Http\Controllers\PolaController;
use App\Http\Controllers\PuertoController;
use App\Http\Controllers\RoxasController;
use App\Http\Controllers\TeodoroController;
use App\Http\Controllers\SocorroController;
use App\Http\Controllers\VictoriaController;

//Admin
use App\Http\Controllers\BacoAdminController;
use App\Http\Controllers\BansudAdminController;
use App\Http\Controllers\BongabongAdminController;
use App\Http\Controllers\BulalacaoAdminController;
use App\Http\Controllers\CalapanAdminController;
use App\Http\Controllers\GloriaAdminController;
use App\Http\Controllers\MansalayAdminController;
use App\Http\Controllers\NaujanAdminController;
use App\Http\Controllers\PinamalayanAdminController;
use App\Http\Controllers\PolaAdminController;
use App\Http\Controllers\PuertoAdminController;
use App\Http\Controllers\RoxasAdminController;
use App\Http\Controllers\TeodoroAdminController;
use App\Http\Controllers\SocorroAdminController;
use App\Http\Controllers\VictoriaAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Landing Page
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'home'])
    // ->middleware('auth', 'verified');
;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Super Admin
Route::group(['middleware' => 'superadmin'], function () {
    Route::get('/adminprofile', [AdminController::class, 'adminProfile']);
    Route::get('/municipality-users', [AdminController::class, 'municipalityUser']);
    Route::post('/user-profile', [AdminController::class, 'userProfile']);
    Route::get('/search-user', [AdminController::class, 'searchUser']);
    Route::get('/inactive-profile', [AdminController::class, 'inactiveProfile']);
    Route::get('/view-profile/{firstname}/{lastname}/{barangay}/{municipality}', [AdminController::class, 'viewProfile']);
    Route::get('/view-inactive/{id}/{municipality}', [AdminController::class, 'viewInactive']);
    Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser']);
    Route::get('/all-past-event', [AdminController::class, 'pastEvent']);
    Route::get('/all-upcoming-event', [AdminController::class, 'incomingEvent']);
    Route::get('/delete-admin-event/{id}/{municipality}', [AdminController::class, 'deleteEvent']);
    Route::get('/accomplishment-report', [AdminController::class, 'accReport']);
    Route::get('/monitoring-report', [AdminController::class, 'monReport']);
    Route::get('/download-acc/{id}/{municipality}', [AdminController::class, 'downloadAcc']);
    Route::get('/delete-acc/{id}/{municipality}', [AdminController::class, 'deleteAcc']);
    Route::get('/download-mon/{id}/{municipality}', [AdminController::class, 'downloadMon']);
    Route::get('/delete-mon/{id}/{municipality}', [AdminController::class, 'deleteMon']);
});
// Route::get('/view-user/{id}', [AdminController::class, 'viewUser']);



//Users

// Baco
Route::group(['middleware' => 'bacouser'], function () {
    Route::get('/BacoProfiling', [BacoController::class, 'profiling']);
    Route::post('/baco-profile-save', [BacoController::class, 'profileSave']);
    Route::get('/view-baco-event/{id}', [BacoController::class, 'viewBacoEvent']);
});

// Bansud
Route::group(['middleware' => 'bansuduser'], function () {
    Route::get('/BansudProfiling', [BansudController::class, 'profiling']);
    Route::post('/bansud-profile-save', [BansudController::class, 'profileSave']);
    Route::get('/view-bansud-event/{id}', [BansudController::class, 'viewBansudEvent']);
});

// Bongabong
Route::group(['middleware' => 'bongabonguser'], function () {
    Route::get('/BongabongProfiling', [BongabongController::class, 'profiling']);
    Route::post('/bongabong-profile-save', [BongabongController::class, 'profileSave']);
    Route::get('/view-bongabong-event/{id}', [BongabongController::class, 'viewBongabongEvent']);
});

// Bulalacao
Route::group(['middleware' => 'bulalacaouser'], function () {
    Route::get('/BulalacaoProfiling', [BulalacaoController::class, 'profiling']);
    Route::post('/bulalacao-profile-save', [BulalacaoController::class, 'profileSave']);
    Route::get('/view-bulalacao-event/{id}', [BulalacaoController::class, 'viewBulalacaoEvent']);
});

// Calapan
Route::group(['middleware' => 'calapanuser'], function () {
    Route::get('/CalapanProfiling', [CalapanController::class, 'profiling']);
    Route::post('/calapan-profile-save', [CalapanController::class, 'profileSave']);
    Route::get('/view-calapan-event/{id}', [CalapanController::class, 'viewCalapanEvent']);
});

// Gloria
Route::group(['middleware' => 'gloriauser'], function () {
    Route::get('/GloriaProfiling', [GloriaController::class, 'profiling']);
    Route::post('/gloria-profile-save', [GloriaController::class, 'profileSave']);
    Route::get('/view-gloria-event/{id}', [GloriaController::class, 'viewGloriaEvent']);
});

// Mansalay
Route::group(['middleware' => 'mansalayuser'], function () {
    Route::get('/MansalayProfiling', [MansalayController::class, 'profiling']);
    Route::post('/mansalay-profile-save', [MansalayController::class, 'profileSave']);
    Route::get('/view-mansalay-event/{id}', [MansalayController::class, 'viewMansalayEvent']);
});

// Naujan
Route::group(['middleware' => 'naujanuser'], function () {
    Route::get('/NaujanProfiling', [NaujanController::class, 'profiling']);
    Route::post('/naujan-profile-save', [NaujanController::class, 'profileSave']);
    Route::get('/view-naujan-event/{id}', [NaujanController::class, 'viewNaujanEvent']);
});

// Pinamalayan
Route::group(['middleware' => 'pinamalayanuser'], function () {
    Route::get('/PinamalayanProfiling', [PinamalayanController::class, 'profiling']);
    Route::post('/pinamalayan-profile-save', [PinamalayanController::class, 'profileSave']);
    Route::get('/view-pinamalayan-event/{id}', [PinamalayanController::class, 'viewPinamalayanEvent']);
});

// Pola
Route::group(['middleware' => 'polauser'], function () {
    Route::get('/PolaProfiling', [PolaController::class, 'profiling']);
    Route::post('/pola-profile-save', [PolaController::class, 'profileSave']);
    Route::get('/view-pola-event/{id}', [PolaController::class, 'viewPolaEvent']);
});

// Puerto
Route::group(['middleware' => 'puertouser'], function () {
    Route::get('/PuertoProfiling', [PuertoController::class, 'profiling']);
    Route::post('/puerto-profile-save', [PuertoController::class, 'profileSave']);
    Route::get('/view-puerto-event/{id}', [PuertoController::class, 'viewPuertoEvent']);
});

// Roxas
Route::get('/RoxasProfiling', [RoxasController::class, 'profiling']);
Route::post('/roxas-profile-save', [RoxasController::class, 'profileSave']);
Route::get('/view-roxas-event/{id}', [RoxasController::class, 'viewRoxasEvent']);

// San Teodoro
Route::group(['middleware' => 'teodorouser'], function () {
    Route::get('/TeodoroProfiling', [TeodoroController::class, 'profiling']);
    Route::post('/teodoro-profile-save', [TeodoroController::class, 'profileSave']);
    Route::get('/view-teodoro-event/{id}', [TeodoroController::class, 'viewTeodoroEvent']);
});

// Socorro
Route::group(['middleware' => 'socorrouser'], function () {
    Route::get('/SocorroProfiling', [SocorroController::class, 'profiling']);
    Route::post('/socorro-profile-save', [SocorroController::class, 'profileSave']);
    Route::get('/view-socorro-event/{id}', [SocorroController::class, 'viewSocorroEvent']);
});

// Victoria
Route::group(['middleware' => 'victoriauser'], function () {
    Route::get('/VictoriaProfiling', [VictoriaController::class, 'profiling']);
    Route::post('/victoria-profile-save', [VictoriaController::class, 'profileSave']);
    Route::get('/view-victoria-event/{id}', [VictoriaController::class, 'viewVictoriaEvent']);
});





//Admin

//Bansud
Route::group(['middleware' => 'bansudadmin'], function () {
    Route::get('/bansudprofile', [BansudAdminController::class, 'bansudProfile']);
    Route::get('/bansud-profile/{id}', [BansudAdminController::class, 'profileBansud']);
    Route::get('/bansud-incoming-event', [BansudAdminController::class, 'bansudIncEvent']);
    Route::post('/save-bansud-event', [BansudAdminController::class, 'saveBansudEvent']);
    Route::get('/delete-bansud-event/{id}', [BansudAdminController::class, 'deleteBansudEvent']);
    Route::get('/bansud-past-event', [BansudAdminController::class, 'bansudPstEvent']);
    Route::get('/bansud-inactive', [BansudAdminController::class, 'bansudInactive']);
    Route::get('/bansud-profile-inactive/{id}', [BansudAdminController::class, 'bansudInactiveProfile']);
    Route::get('/bansud-accomplishment-report', [BansudAdminController::class, 'bansudAccReport']);
    Route::post('/add-bansud-acc', [BansudAdminController::class, 'addBansudAcc']);
    Route::get('/download-bansud-acc/{id}/{municipality}', [BansudAdminController::class, 'downloadBansudAcc']);
    Route::get('/delete-bansud-acc/{id}/{municipality}', [BansudAdminController::class, 'deleteBansudAcc']);
    Route::get('/bansud-monitoring-report', [BansudAdminController::class, 'bansudMonReport']);
    Route::post('/add-bansud-mon', [BansudAdminController::class, 'addBansudMon']);
    Route::get('/download-bansud-mon/{id}/{municipality}', [BansudAdminController::class, 'downloadBansudMon']);
    Route::get('/delete-bansud-mon/{id}/{municipality}', [BansudAdminController::class, 'deleteBansudMon']);
});
// Baco
Route::group(['middleware' => 'bacoadmin'], function () {
    Route::get('/bacoprofile', [BacoAdminController::class, 'bacoProfile']);
    Route::get('/baco-profile/{id}', [BacoAdminController::class, 'profileBaco']);
    Route::get('/baco-incoming-event', [BacoAdminController::class, 'bacoIncEvent']);
    Route::post('/save-baco-event', [BacoAdminController::class, 'saveBacoEvent']);
    Route::get('/delete-baco-event/{id}', [BacoAdminController::class, 'deleteBacoEvent']);
    Route::get('/baco-past-event', [BacoAdminController::class, 'bacoPstEvent']);
    Route::get('/baco-inactive', [BacoAdminController::class, 'bacoInactive']);
    Route::get('/baco-profile-inactive/{id}', [BacoAdminController::class, 'bacoInactiveProfile']);
    Route::get('/baco-accomplishment-report', [BacoAdminController::class, 'bacoAccReport']);
    Route::post('/add-baco-acc', [BacoAdminController::class, 'addBacoAcc']);
    Route::get('/download-baco-acc/{id}/{municipality}', [BacoAdminController::class, 'downloadBacoAcc']);
    Route::get('/delete-baco-acc/{id}/{municipality}', [BacoAdminController::class, 'deleteBacoAcc']);
    Route::get('/baco-monitoring-report', [BacoAdminController::class, 'bacoMonReport']);
    Route::post('/add-baco-mon', [BacoAdminController::class, 'addBacoMon']);
    Route::get('/download-baco-mon/{id}/{municipality}', [BacoAdminController::class, 'downloadBacoMon']);
    Route::get('/delete-baco-mon/{id}/{municipality}', [BacoAdminController::class, 'deleteBacoMon']);
});
// Bongabong
Route::group(['middleware' => 'bongabongadmin'], function () {
    Route::get('/bongabongprofile', [BongabongAdminController::class, 'bongabongProfile']);
    Route::get('/bongabong-profile/{id}', [BongabongAdminController::class, 'profileBongabong']);
    Route::get('/bongabong-incoming-event', [BongabongAdminController::class, 'bongabongIncEvent']);
    Route::post('/save-bongabong-event', [BongabongAdminController::class, 'saveBongabongEvent']);
    Route::get('/delete-bongabong-event/{id}', [BongabongAdminController::class, 'deleteBongabongEvent']);
    Route::get('/bongabong-past-event', [BongabongAdminController::class, 'bongabongPstEvent']);
    Route::get('/bongabong-inactive', [BongabongAdminController::class, 'bongabongInactive']);
    Route::get('/bongabong-profile-inactive/{id}', [BongabongAdminController::class, 'bongabongInactiveProfile']);
    Route::get('/bongabong-accomplishment-report', [BongabongAdminController::class, 'bongabongAccReport']);
    Route::post('/add-bongabong-acc', [BongabongAdminController::class, 'addBongabongAcc']);
    Route::get('/download-bongabong-acc/{id}/{municipality}', [BongabongAdminController::class, 'downloadBongabongAcc']);
    Route::get('/delete-bongabong-acc/{id}/{municipality}', [BongabongAdminController::class, 'deleteBongabongAcc']);
    Route::get('/bongabong-monitoring-report', [BongabongAdminController::class, 'bongabongMonReport']);
    Route::post('/add-bongabong-mon', [BongabongAdminController::class, 'addBongabongMon']);
    Route::get('/download-bongabong-mon/{id}/{municipality}', [BongabongAdminController::class, 'downloadBongabongMon']);
    Route::get('/delete-bongabong-mon/{id}/{municipality}', [BongabongAdminController::class, 'deleteBongabongMon']);
});
// Bulalacao
Route::group(['middleware' => 'bulalacaoadmin'], function () {
    Route::get('/bulalacaoprofile', [BulalacaoAdminController::class, 'bulalacaoProfile']);
    Route::get('/bulalacao-profile/{id}', [BulalacaoAdminController::class, 'profileBulalacao']);
    Route::get('/bulalacao-incoming-event', [BulalacaoAdminController::class, 'bulalacaoIncEvent']);
    Route::post('/save-bulalacao-event', [BulalacaoAdminController::class, 'saveBulalacaoEvent']);
    Route::get('/delete-bulalacao-event/{id}', [BulalacaoAdminController::class, 'deleteBulalacaoEvent']);
    Route::get('/bulalacao-past-event', [BulalacaoAdminController::class, 'bulalacaoPstEvent']);
    Route::get('/bulalacao-inactive', [BulalacaoAdminController::class, 'bulalacaoInactive']);
    Route::get('/bulalacao-profile-inactive/{id}', [BulalacaoAdminController::class, 'bulalacaoInactiveProfile']);
    Route::get('/bulalacao-accomplishment-report', [BulalacaoAdminController::class, 'bulalacaoAccReport']);
    Route::post('/add-bulalacao-acc', [BulalacaoAdminController::class, 'addBulalacaoAcc']);
    Route::get('/download-bulalacao-acc/{id}/{municipality}', [BulalacaoAdminController::class, 'downloadBulalacaoAcc']);
    Route::get('/delete-bulalacao-acc/{id}/{municipality}', [BulalacaoAdminController::class, 'deleteBulalacaoAcc']);
    Route::get('/bulalacao-monitoring-report', [BulalacaoAdminController::class, 'bulalacaoMonReport']);
    Route::post('/add-bulalacao-mon', [BulalacaoAdminController::class, 'addBulalacaoMon']);
    Route::get('/download-bulalacao-mon/{id}/{municipality}', [BulalacaoAdminController::class, 'downloadBulalacaoMon']);
    Route::get('/delete-bulalacao-mon/{id}/{municipality}', [BulalacaoAdminController::class, 'deleteBulalacaoMon']);
});
// Calapan
Route::group(['middleware' => 'calapanadmin'], function () {
    Route::get('/calapanprofile', [CalapanAdminController::class, 'calapanProfile']);
    Route::get('/calapan-profile/{id}', [CalapanAdminController::class, 'profileCalapan']);
    Route::get('/calapan-incoming-event', [CalapanAdminController::class, 'calapanIncEvent']);
    Route::post('/save-calapan-event', [CalapanAdminController::class, 'saveCalapanEvent']);
    Route::get('/delete-calapan-event/{id}', [CalapanAdminController::class, 'deleteCalapanEvent']);
    Route::get('/calapan-past-event', [CalapanAdminController::class, 'calapanPstEvent']);
    Route::get('/calapan-inactive', [CalapanAdminController::class, 'calapanInactive']);
    Route::get('/calapan-profile-inactive/{id}', [CalapanAdminController::class, 'calapanInactiveProfile']);
    Route::get('/calapan-accomplishment-report', [CalapanAdminController::class, 'calapanAccReport']);
    Route::post('/add-calapan-acc', [CalapanAdminController::class, 'addCalapanAcc']);
    Route::get('/download-calapan-acc/{id}/{municipality}', [CalapanAdminController::class, 'downloadCalapanAcc']);
    Route::get('/delete-calapan-acc/{id}/{municipality}', [CalapanAdminController::class, 'deleteCalapanAcc']);
    Route::get('/calapan-monitoring-report', [CalapanAdminController::class, 'calapanMonReport']);
    Route::post('/add-calapan-mon', [CalapanAdminController::class, 'addCalapanMon']);
    Route::get('/download-calapan-mon/{id}/{municipality}', [CalapanAdminController::class, 'downloadCalapanMon']);
    Route::get('/delete-calapan-mon/{id}/{municipality}', [CalapanAdminController::class, 'deleteCalapanMon']);
});
// Gloria
Route::group(['middleware' => 'gloriaadmin'], function () {
    Route::get('/gloriaprofile', [GloriaAdminController::class, 'gloriaProfile']);
    Route::get('/gloria-profile/{id}', [GloriaAdminController::class, 'profileGloria']);
    Route::get('/gloria-incoming-event', [GloriaAdminController::class, 'gloriaIncEvent']);
    Route::post('/save-gloria-event', [GloriaAdminController::class, 'saveGloriaEvent']);
    Route::get('/delete-gloria-event/{id}', [GloriaAdminController::class, 'deleteGloriaEvent']);
    Route::get('/gloria-past-event', [GloriaAdminController::class, 'gloriaPstEvent']);
    Route::get('/gloria-inactive', [GloriaAdminController::class, 'gloriaInactive']);
    Route::get('/gloria-profile-inactive/{id}', [GloriaAdminController::class, 'gloriaInactiveProfile']);
    Route::get('/gloria-accomplishment-report', [GloriaAdminController::class, 'gloriaAccReport']);
    Route::post('/add-gloria-acc', [GloriaAdminController::class, 'addGloriaAcc']);
    Route::get('/download-gloria-acc/{id}/{municipality}', [GloriaAdminController::class, 'downloadGloriaAcc']);
    Route::get('/delete-gloria-acc/{id}/{municipality}', [GloriaAdminController::class, 'deleteGloriaAcc']);
    Route::get('/gloria-monitoring-report', [GloriaAdminController::class, 'gloriaMonReport']);
    Route::post('/add-gloria-mon', [GloriaAdminController::class, 'addGloriaMon']);
    Route::get('/download-gloria-mon/{id}/{municipality}', [GloriaAdminController::class, 'downloadGloriaMon']);
    Route::get('/delete-gloria-mon/{id}/{municipality}', [GloriaAdminController::class, 'deleteGloriaMon']);
});
// Mansalay
Route::group(['middleware' => 'mansalayadmin'], function () {
    Route::get('/mansalayprofile', [MansalayAdminController::class, 'mansalayProfile']);
    Route::get('/mansalay-profile/{id}', [MansalayAdminController::class, 'profileMansalay']);
    Route::get('/mansalay-incoming-event', [MansalayAdminController::class, 'mansalayIncEvent']);
    Route::post('/save-mansalay-event', [MansalayAdminController::class, 'saveMansalayEvent']);
    Route::get('/delete-mansalay-event/{id}', [MansalayAdminController::class, 'deleteMansalayEvent']);
    Route::get('/mansalay-past-event', [MansalayAdminController::class, 'mansalayPstEvent']);
    Route::get('/mansalay-inactive', [MansalayAdminController::class, 'mansalayInactive']);
    Route::get('/mansalay-profile-inactive/{id}', [MansalayAdminController::class, 'mansalayInactiveProfile']);
    Route::get('/mansalay-accomplishment-report', [MansalayAdminController::class, 'mansalayAccReport']);
    Route::post('/add-mansalay-acc', [MansalayAdminController::class, 'addMansalayAcc']);
    Route::get('/download-mansalay-acc/{id}/{municipality}', [MansalayAdminController::class, 'downloadMansalayAcc']);
    Route::get('/delete-mansalay-acc/{id}/{municipality}', [MansalayAdminController::class, 'deleteMansalayAcc']);
    Route::get('/mansalay-monitoring-report', [MansalayAdminController::class, 'mansalayMonReport']);
    Route::post('/add-mansalay-mon', [MansalayAdminController::class, 'addMansalayMon']);
    Route::get('/download-mansalay-mon/{id}/{municipality}', [MansalayAdminController::class, 'downloadMansalayMon']);
    Route::get('/delete-mansalay-mon/{id}/{municipality}', [MansalayAdminController::class, 'deleteMansalayMon']);
});
// Naujan
Route::group(['middleware' => 'naujanadmin'], function () {
    Route::get('/naujanprofile', [NaujanAdminController::class, 'naujanProfile']);
    Route::get('/naujan-profile/{id}', [NaujanAdminController::class, 'profileNaujan']);
    Route::get('/naujan-incoming-event', [NaujanAdminController::class, 'naujanIncEvent']);
    Route::post('/save-naujan-event', [NaujanAdminController::class, 'saveNaujanEvent']);
    Route::get('/delete-naujan-event/{id}', [NaujanAdminController::class, 'deleteNaujanEvent']);
    Route::get('/naujan-past-event', [NaujanAdminController::class, 'naujanPstEvent']);
    Route::get('/naujan-inactive', [NaujanAdminController::class, 'naujanInactive']);
    Route::get('/naujan-profile-inactive/{id}', [NaujanAdminController::class, 'naujanInactiveProfile']);
    Route::get('/naujan-accomplishment-report', [NaujanAdminController::class, 'naujanAccReport']);
    Route::post('/add-naujan-acc', [NaujanAdminController::class, 'addNaujanAcc']);
    Route::get('/download-naujan-acc/{id}/{municipality}', [NaujanAdminController::class, 'downloadNaujanAcc']);
    Route::get('/delete-naujan-acc/{id}/{municipality}', [NaujanAdminController::class, 'deleteNaujanAcc']);
    Route::get('/naujan-monitoring-report', [NaujanAdminController::class, 'naujanMonReport']);
    Route::post('/add-naujan-mon', [NaujanAdminController::class, 'addNaujanMon']);
    Route::get('/download-naujan-mon/{id}/{municipality}', [NaujanAdminController::class, 'downloadNaujanMon']);
    Route::get('/delete-naujan-mon/{id}/{municipality}', [NaujanAdminController::class, 'deleteNaujanMon']);
});
// Pinamalayan
Route::group(['middleware' => 'pinamalayanadmin'], function () {
    Route::get('/pinamalayanprofile', [PinamalayanAdminController::class, 'pinamalayanProfile']);
    Route::get('/pinamalayan-profile/{id}', [PinamalayanAdminController::class, 'profilePinamalayan']);
    Route::get('/pinamalayan-incoming-event', [PinamalayanAdminController::class, 'pinamalayanIncEvent']);
    Route::post('/save-pinamalayan-event', [PinamalayanAdminController::class, 'savePinamalayanEvent']);
    Route::get('/delete-pinamalayan-event/{id}', [PinamalayanAdminController::class, 'deletePinamalayanEvent']);
    Route::get('/pinamalayan-past-event', [PinamalayanAdminController::class, 'pinamalayanPstEvent']);
    Route::get('/pinamalayan-inactive', [PinamalayanAdminController::class, 'pinamalayanInactive']);
    Route::get('/pinamalayan-profile-inactive/{id}', [PinamalayanAdminController::class, 'pinamalayanInactiveProfile']);
    Route::get('/pinamalayan-accomplishment-report', [PinamalayanAdminController::class, 'pinamalayanAccReport']);
    Route::post('/add-pinamalayan-acc', [PinamalayanAdminController::class, 'addPinamalayanAcc']);
    Route::get('/download-pinamalayan-acc/{id}/{municipality}', [PinamalayanAdminController::class, 'downloadPinamalayanAcc']);
    Route::get('/delete-pinamalayan-acc/{id}/{municipality}', [PinamalayanAdminController::class, 'deletePinamalayanAcc']);
    Route::get('/pinamalayan-monitoring-report', [PinamalayanAdminController::class, 'pinamalayanMonReport']);
    Route::post('/add-pinamalayan-mon', [PinamalayanAdminController::class, 'addPinamalayanMon']);
    Route::get('/download-pinamalayan-mon/{id}/{municipality}', [PinamalayanAdminController::class, 'downloadPinamalayanMon']);
    Route::get('/delete-pinamalayan-mon/{id}/{municipality}', [PinamalayanAdminController::class, 'deletePinamalayanMon']);
});
// Pola
Route::group(['middleware' => 'polaadmin'], function () {
    Route::get('/polaprofile', [PolaAdminController::class, 'polaProfile']);
    Route::get('/pola-profile/{id}', [PolaAdminController::class, 'profilePola']);
    Route::get('/pola-incoming-event', [PolaAdminController::class, 'polaIncEvent']);
    Route::post('/save-pola-event', [PolaAdminController::class, 'savePolaEvent']);
    Route::get('/delete-pola-event/{id}', [PolaAdminController::class, 'deletePolaEvent']);
    Route::get('/pola-past-event', [PolaAdminController::class, 'polaPstEvent']);
    Route::get('/pola-inactive', [PolaAdminController::class, 'polaInactive']);
    Route::get('/pola-profile-inactive/{id}', [PolaAdminController::class, 'polaInactiveProfile']);
    Route::get('/pola-accomplishment-report', [PolaAdminController::class, 'polaAccReport']);
    Route::post('/add-pola-acc', [PolaAdminController::class, 'addPolaAcc']);
    Route::get('/download-pola-acc/{id}/{municipality}', [PolaAdminController::class, 'downloadPolaAcc']);
    Route::get('/delete-pola-acc/{id}/{municipality}', [PolaAdminController::class, 'deletePolaAcc']);
    Route::get('/pola-monitoring-report', [PolaAdminController::class, 'polaMonReport']);
    Route::post('/add-pola-mon', [PolaAdminController::class, 'addPolaMon']);
    Route::get('/download-pola-mon/{id}/{municipality}', [PolaAdminController::class, 'downloadPolaMon']);
    Route::get('/delete-pola-mon/{id}/{municipality}', [PolaAdminController::class, 'deletePolaMon']);
});
// Puerto
Route::group(['middleware' => 'puertoadmin'], function () {
    Route::get('/puertoprofile', [PuertoAdminController::class, 'puertoProfile']);
    Route::get('/puerto-profile/{id}', [PuertoAdminController::class, 'profilePuerto']);
    Route::get('/puerto-incoming-event', [PuertoAdminController::class, 'puertoIncEvent']);
    Route::post('/save-puerto-event', [PuertoAdminController::class, 'savePuertoEvent']);
    Route::get('/delete-puerto-event/{id}', [PuertoAdminController::class, 'deletePuertoEvent']);
    Route::get('/puerto-past-event', [PuertoAdminController::class, 'puertoPstEvent']);
    Route::get('/puerto-inactive', [PuertoAdminController::class, 'puertoInactive']);
    Route::get('/puerto-profile-inactive/{id}', [PuertoAdminController::class, 'puertoInactiveProfile']);
    Route::get('/puerto-accomplishment-report', [PuertoAdminController::class, 'puertoAccReport']);
    Route::post('/add-puerto-acc', [PuertoAdminController::class, 'addPuertoAcc']);
    Route::get('/download-puerto-acc/{id}/{municipality}', [PuertoAdminController::class, 'downloadPuertoAcc']);
    Route::get('/delete-puerto-acc/{id}/{municipality}', [PuertoAdminController::class, 'deletePuertoAcc']);
    Route::get('/puerto-monitoring-report', [PuertoAdminController::class, 'puertoMonReport']);
    Route::post('/add-puerto-mon', [PuertoAdminController::class, 'addPuertoMon']);
    Route::get('/download-puerto-mon/{id}/{municipality}', [PuertoAdminController::class, 'downloadPuertoMon']);
    Route::get('/delete-puerto-mon/{id}/{municipality}', [PuertoAdminController::class, 'deletePuertoMon']);
});
// Roxas
Route::group(['middleware' => 'roxasadmin'], function () {
    Route::get('/roxasprofile', [RoxasAdminController::class, 'roxasProfile']);
    Route::get('/roxas-profile/{id}', [RoxasAdminController::class, 'profileRoxas']);
    Route::get('/roxas-incoming-event', [RoxasAdminController::class, 'roxasIncEvent']);
    Route::post('/save-roxas-event', [RoxasAdminController::class, 'saveRoxasEvent']);
    Route::get('/delete-roxas-event/{id}', [RoxasAdminController::class, 'deleteRoxasEvent']);
    Route::get('/roxas-past-event', [RoxasAdminController::class, 'roxasPstEvent']);
    Route::get('/roxas-inactive', [RoxasAdminController::class, 'roxasInactive']);
    Route::get('/roxas-profile-inactive/{id}', [RoxasAdminController::class, 'roxasInactiveProfile']);
    Route::get('/roxas-accomplishment-report', [RoxasAdminController::class, 'roxasAccReport']);
    Route::post('/add-roxas-acc', [RoxasAdminController::class, 'addRoxasAcc']);
    Route::get('/download-roxas-acc/{id}/{municipality}', [RoxasAdminController::class, 'downloadRoxasAcc']);
    Route::get('/delete-roxas-acc/{id}/{municipality}', [RoxasAdminController::class, 'deleteRoxasAcc']);
    Route::get('/roxas-monitoring-report', [RoxasAdminController::class, 'roxasMonReport']);
    Route::post('/add-roxas-mon', [RoxasAdminController::class, 'addRoxasMon']);
    Route::get('/download-roxas-mon/{id}/{municipality}', [RoxasAdminController::class, 'downloadRoxasMon']);
    Route::get('/delete-roxas-mon/{id}/{municipality}', [RoxasAdminController::class, 'deleteRoxasMon']);
});

// Socorro
Route::group(['middleware' => 'socorroadmin'], function () {
    Route::get('/socorroprofile', [SocorroAdminController::class, 'socorroProfile']);
    Route::get('/socorro-profile/{id}', [SocorroAdminController::class, 'profileSocorro']);
    Route::get('/socorro-incoming-event', [SocorroAdminController::class, 'socorroIncEvent']);
    Route::post('/save-socorro-event', [SocorroAdminController::class, 'saveSocorroEvent']);
    Route::get('/delete-socorro-event/{id}', [SocorroAdminController::class, 'deleteSocorroEvent']);
    Route::get('/socorro-past-event', [SocorroAdminController::class, 'socorroPstEvent']);
    Route::get('/socorro-inactive', [SocorroAdminController::class, 'socorroInactive']);
    Route::get('/socorro-profile-inactive/{id}', [SocorroAdminController::class, 'socorroInactiveProfile']);
    Route::get('/socorro-accomplishment-report', [SocorroAdminController::class, 'socorroAccReport']);
    Route::post('/add-socorro-acc', [SocorroAdminController::class, 'addSocorroAcc']);
    Route::get('/download-socorro-acc/{id}/{municipality}', [SocorroAdminController::class, 'downloadSocorroAcc']);
    Route::get('/delete-socorro-acc/{id}/{municipality}', [SocorroAdminController::class, 'deleteSocorroAcc']);
    Route::get('/socorro-monitoring-report', [SocorroAdminController::class, 'socorroMonReport']);
    Route::post('/add-socorro-mon', [SocorroAdminController::class, 'addSocorroMon']);
    Route::get('/download-socorro-mon/{id}/{municipality}', [SocorroAdminController::class, 'downloadSocorroMon']);
    Route::get('/delete-socorro-mon/{id}/{municipality}', [SocorroAdminController::class, 'deleteSocorroMon']);
});

// Teodoro
Route::group(['middleware' => 'teodoroadmin'], function () {
    Route::get('/teodoroprofile', [TeodoroAdminController::class, 'teodoroProfile']);
    Route::get('/teodoro-profile/{id}', [TeodoroAdminController::class, 'profileTeodoro']);
    Route::get('/teodoro-incoming-event', [TeodoroAdminController::class, 'teodoroIncEvent']);
    Route::post('/save-teodoro-event', [TeodoroAdminController::class, 'saveTeodoroEvent']);
    Route::get('/delete-teodoro-event/{id}', [TeodoroAdminController::class, 'deleteTeodoroEvent']);
    Route::get('/teodoro-past-event', [TeodoroAdminController::class, 'teodoroPstEvent']);
    Route::get('/teodoro-inactive', [TeodoroAdminController::class, 'teodoroInactive']);
    Route::get('/teodoro-profile-inactive/{id}', [TeodoroAdminController::class, 'teodoroInactiveProfile']);
    Route::get('/teodoro-accomplishment-report', [TeodoroAdminController::class, 'teodoroAccReport']);
    Route::post('/add-teodoro-acc', [TeodoroAdminController::class, 'addTeodoroAcc']);
    Route::get('/download-teodoro-acc/{id}/{municipality}', [TeodoroAdminController::class, 'downloadTeodoroAcc']);
    Route::get('/delete-teodoro-acc/{id}/{municipality}', [TeodoroAdminController::class, 'deleteTeodoroAcc']);
    Route::get('/teodoro-monitoring-report', [TeodoroAdminController::class, 'teodoroMonReport']);
    Route::post('/add-teodoro-mon', [TeodoroAdminController::class, 'addTeodoroMon']);
    Route::get('/download-teodoro-mon/{id}/{municipality}', [TeodoroAdminController::class, 'downloadTeodoroMon']);
    Route::get('/delete-teodoro-mon/{id}/{municipality}', [TeodoroAdminController::class, 'deleteTeodoroMon']);
});

// Victoria
Route::group(['middleware' => 'victoriaadmin'], function () {
    Route::get('/victoriaprofile', [VictoriaAdminController::class, 'victoriaProfile']);
    Route::get('/victoria-profile/{id}', [VictoriaAdminController::class, 'profileVictoria']);
    Route::get('/victoria-incoming-event', [VictoriaAdminController::class, 'victoriaIncEvent']);
    Route::post('/save-victoria-event', [VictoriaAdminController::class, 'saveVictoriaEvent']);
    Route::get('/delete-victoria-event/{id}', [VictoriaAdminController::class, 'deleteVictoriaEvent']);
    Route::get('/victoria-past-event', [VictoriaAdminController::class, 'victoriaPstEvent']);
    Route::get('/victoria-inactive', [VictoriaAdminController::class, 'victoriaInactive']);
    Route::get('/victoria-profile-inactive/{id}', [VictoriaAdminController::class, 'victoriaInactiveProfile']);
    Route::get('/victoria-accomplishment-report', [VictoriaAdminController::class, 'victoriaAccReport']);
    Route::post('/add-victoria-acc', [VictoriaAdminController::class, 'addVictoriaAcc']);
    Route::get('/download-victoria-acc/{id}/{municipality}', [VictoriaAdminController::class, 'downloadVictoriaAcc']);
    Route::get('/delete-victoria-acc/{id}/{municipality}', [VictoriaAdminController::class, 'deleteVictoriaAcc']);
    Route::get('/victoria-monitoring-report', [VictoriaAdminController::class, 'victoriaMonReport']);
    Route::post('/add-victoria-mon', [VictoriaAdminController::class, 'addVictoriaMon']);
    Route::get('/download-victoria-mon/{id}/{municipality}', [VictoriaAdminController::class, 'downloadVictoriaMon']);
    Route::get('/delete-victoria-mon/{id}/{municipality}', [VictoriaAdminController::class, 'deleteVictoriaMon']);
});
