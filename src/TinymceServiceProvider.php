<?php

namespace Petehouston\Tinymce;

use Illuminate\Support\ServiceProvider;

class TinymceServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // load views
        $this->loadViewsFrom(realpath(__DIR__.'/views'), 'mceImageUpload');

        // ability to publish view
        $this->publishes([
            __DIR__.'/views' => resource_path('views/petehouston/tinymce'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // load routes
        include __DIR__.'/routes.php';

        // load controller
        $this->app->make('Petehouston\Tinymce\TinymceController');
    }

}