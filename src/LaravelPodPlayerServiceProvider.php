<?php

namespace Fantata\LaravelPodPlayer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Fantata\LaravelPodPlayer\AudioPlayerComponent;

class LaravelPodPlayerServiceProvider extends ServiceProvider {

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views', 'fantata');

        Blade::component('laravel-audio-player', AudioPlayerComponent::class);

        $this->publishes([
            __DIR__.'/public' => public_path('vendor/fantata'),
        ], 'public');

    }

    public function register() {

    }

}