<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Answer;

class SoftDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'soft:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft Delete task';

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
        $all_non_ans=Answer::whereNull('answer')->get();
        foreach($all_non_ans as $all){
            $all->softDeletes();
        }
    }
}
