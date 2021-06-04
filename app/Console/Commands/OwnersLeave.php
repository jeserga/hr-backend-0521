<?php

namespace App\Console\Commands;

use App\Http\Controllers\ParkController;
use App\Models\Park;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class OwnersLeave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'owners:leave {park?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expel all owners from park, if park is not specified, this command use all parks';

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
     * @return int
     */
    public function handle()
    {
        if ($this->hasOption('park_id')) {
            $parks = [$this->argument('park_id')];
        } else {
            $parks = Park::pluck('id');
        }

        foreach ($parks as $park) {
            $request = (new Request)->replace(['park_id' => $park]);
            $parkController = new ParkController();
            $parkController->forceOwnersLeave($request);
        }

        return 0;
    }
}
