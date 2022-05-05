<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class IseedTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iseed:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds all the tables into seeders.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('iseed users --force');
        Artisan::call('iseed permissions --force');
        Artisan::call('iseed roles --force');
        Artisan::call('iseed brands --force');
        Artisan::call('iseed products --force');
        Artisan::call('iseed model_has_permissions --force');
        Artisan::call('iseed model_has_roles --force');
        Artisan::call('iseed role_has_permissions --force');
        return 0;
    }
}