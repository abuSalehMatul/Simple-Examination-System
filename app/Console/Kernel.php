<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
// use App\Helpers\SendTextAreaEmail;
use App\Answer;
use App\Jobs\EmailTextArea;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SoftDelete::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $mail_ans=DB::table('answers')->join('questions','questions.id','=','answers.question_id')
                                    ->where('questions.type','=','textarea')
                                    ->where('answers.status','=',0)
                                    ->select('answers.*')
                                    ->get();
            EmailTextArea::dispatch($mail_ans);
            foreach($mail_ans as $ans){
                $ans->status=1;
                $ans->save();
            }
            
        })->cron('0 1 */2 * *');
        $schedule->command('soft:delete')
        ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
