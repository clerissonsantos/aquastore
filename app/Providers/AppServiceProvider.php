<?php

namespace App\Providers;

use App\Events\VendaExcluidaEvent;
use App\Events\VendaFinalizadaEvent;
use App\Listeners\AlterarEstoqueListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            VendaFinalizadaEvent::class,
            AlterarEstoqueListener::class,
        );

        Event::listen(
            VendaExcluidaEvent::class,
            AlterarEstoqueListener::class,
        );
    }
}
