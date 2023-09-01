<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Admins
        'superadmin' => \App\Http\Middleware\superadmin::class,
        'bansudadmin' => \App\Http\Middleware\BansudAdminOnly::class,
        'bacoadmin' => \App\Http\Middleware\BacoAdminOnly::class,
        'bulalacaoadmin' => \App\Http\Middleware\BulalacaoAdminOnly::class,
        'bongabongadmin' => \App\Http\Middleware\BongabongAdminOnly::class,
        'calapanadmin' => \App\Http\Middleware\CalapanAdminOnly::class,
        'gloriaadmin' => \App\Http\Middleware\GloriaAdminOnly::class,
        'mansalayadmin' => \App\Http\Middleware\MansalayAdminOnly::class,
        'naujanadmin' => \App\Http\Middleware\NaujanAdminOnly::class,
        'pinamalayanadmin' => \App\Http\Middleware\PinamalayanAdminOnly::class,
        'polaadmin' => \App\Http\Middleware\PolaAdminOnly::class,
        'socorroadmin' => \App\Http\Middleware\SocorroAdminOnly::class,
        'teodoroadmin' => \App\Http\Middleware\TeodoroAdminOnly::class,
        'puertoadmin' => \App\Http\Middleware\PuertoAdminOnly::class,
        'victoriaadmin' => \App\Http\Middleware\VictoriaAdminOnly::class,

        // Users
        'bansuduser' => \App\Http\Middleware\BansudUser::class,
        'bacouser' => \App\Http\Middleware\BacoUser::class,
        'bulalacaouser' => \App\Http\Middleware\BulalacaoUser::class,
        'bongabonguser' => \App\Http\Middleware\BongabongUser::class,
        'calapanuser' => \App\Http\Middleware\CalapanUser::class,
        'gloriauser' => \App\Http\Middleware\GloriaUser::class,
        'mansalayuser' => \App\Http\Middleware\MansalayUser::class,
        'naujanuser' => \App\Http\Middleware\NaujanUser::class,
        'polauser' => \App\Http\Middleware\PolaUser::class,
        'pinamalayanuser' => \App\Http\Middleware\PinamalayanUser::class,
        'socorrouser' => \App\Http\Middleware\SocorroUser::class,
        'teodorouser' => \App\Http\Middleware\TeodoroUser::class,
        'puertouser' => \App\Http\Middleware\PuertoUser::class,
        'victoriauser' => \App\Http\Middleware\VictoriaUser::class,
    ];
}
