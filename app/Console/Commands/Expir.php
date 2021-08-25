<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the =>expier everyMinute ';

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
        $users = User::where('expier', 0)->get(); // collection of users
        foreach ($users as $user) {
            $user->update(['expier' => 1]);
        }
    }
}
