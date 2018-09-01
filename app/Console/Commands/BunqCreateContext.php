<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\Bunq;
use Illuminate\Console\Command;

class BunqCreateContext extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bunq:context';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates context for bunq';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bunq = new Bunq();
        $bunq->createContext();

        $this->info('Created context!');
    }
}
