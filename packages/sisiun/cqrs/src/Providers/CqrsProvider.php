<?php

namespace sisiun\cqrs\Providers;

use Illuminate\Support\ServiceProvider;

class CqrsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
