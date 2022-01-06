<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    // public const HOME = '/home';
    public const ImmigrationOfficerDashboard = 'immigration-officer/dashboard';
    public const BdGovtDashboard = 'bd-govt/dashboard';
    public const AdministratorDashboard = 'administrator/dashboard';
    public const RapidPcrCenterAdministratorDashboard = 'rapid-pcr-center-administrator/dashboard';
    public const RapidPCRCenterPathologistDashboard = 'rapid-pcr-center-pathologist/dashboard';
    public const PathologistDashboard = 'pathologist/dashboard';
    public const ReceptionistDashboard = 'receptionist/dashboard';
    public const SuperAdminDashboard = 'super-admin/dashboard';
    public const TrustedMedicalAssistantDashboard = 'trusted-medical-assistant/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
