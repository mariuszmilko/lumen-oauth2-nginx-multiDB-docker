<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseCreate extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'database:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run my database create.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
    	// DB::getConnection()->statement('CREATE DATABASE :schema', ['schema' => $schemaName]);
        $this->info('it works!');
    }
}
