<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\MyCommand;

class DbCommandServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.database.create', function () {

            return new \App\Console\Commands\DatabaseCreate;
            
        });

        $this->commands(
            'command.database.create'
        );
    }
}
