<?php

namespace LaravelPackages\Location\Providers;

use LaravelPackages\Location\Contracts\AddressContract;
use LaravelPackages\Location\Contracts\StreetContract;
use LaravelPackages\Location\Contracts\CityContract;
use LaravelPackages\Location\Contracts\CityRegionContract;
use LaravelPackages\Location\Contracts\CountryContract;
use LaravelPackages\Location\Contracts\CountryRegionContract;
use LaravelPackages\Location\Contracts\NeighborhoodContract;
use LaravelPackages\Location\Contracts\StateContract;
use LaravelPackages\Location\Repositories\AddressRepository;
use LaravelPackages\Location\Repositories\StreetRepository;
use LaravelPackages\Location\Repositories\CityRegionRepository;
use LaravelPackages\Location\Repositories\CityRepository;
use LaravelPackages\Location\Repositories\CountryRegionRepository;
use LaravelPackages\Location\Repositories\CountryRepository;
use LaravelPackages\Location\Repositories\NeighborhoodRepository;
use LaravelPackages\Location\Repositories\StateRepository;
use LaravelPackages\Location\Services\AddressService;
use LaravelPackages\Location\Services\StreetService;
use LaravelPackages\Location\Services\CityRegionService;
use LaravelPackages\Location\Services\CityService;
use LaravelPackages\Location\Services\CountryRegionService;
use LaravelPackages\Location\Services\CountryService;
use LaravelPackages\Location\Services\NeighborhoodService;
use LaravelPackages\Location\Services\StateService;

use Collective\Html\FormFacade as Form;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', 'location');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'location');
        $this->publishes([__DIR__ . '/../../config/cw_location.php' => config_path('cw_location.php')], 'config');

        Form::component('address', 'location::components.forms.address', ['name' => 'address', 'value' => [], 'attributes' => []]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryContract::class, CountryRepository::class);
        $this->app->bind('CountryService', function ($app) {
            return new CountryService($app->make(CountryContract::class));
        });

        $this->app->bind(CountryRegionContract::class, CountryRegionRepository::class);
        $this->app->bind('CountryRegionService', function ($app) {
            return new CountryRegionService($app->make(CountryRegionContract::class));
        });

        $this->app->bind(StateContract::class, StateRepository::class);
        $this->app->bind('StateService', function ($app) {
            return new StateService($app->make(StateContract::class));
        });

        $this->app->bind(CityContract::class, CityRepository::class);
        $this->app->bind('CityService', function ($app) {
            return new CityService($app->make(CityContract::class));
        });

        $this->app->bind(CityRegionContract::class, CityRegionRepository::class);
        $this->app->bind('CityRegionService', function ($app) {
            return new CityRegionService($app->make(CityRegionContract::class));
        });

        $this->app->bind(NeighborhoodContract::class, NeighborhoodRepository::class);
        $this->app->bind('NeighborhoodService', function ($app) {
            return new NeighborhoodService($app->make(NeighborhoodContract::class));
        });

        $this->app->bind(StreetContract::class, StreetRepository::class);
        $this->app->bind('StreetService', function ($app) {
            return new StreetService($app->make(StreetContract::class));
        });

        $this->app->bind(AddressContract::class, AddressRepository::class);
        $this->app->bind('AddressService', function ($app) {
            return new AddressService(
                $app->make(CountryContract::class),
                $app->make(StateContract::class),
                $app->make(CityContract::class),
                $app->make(NeighborhoodContract::class),
                $app->make(StreetContract::class),
                $app->make(AddressContract::class)
            );
        });

    }

}
