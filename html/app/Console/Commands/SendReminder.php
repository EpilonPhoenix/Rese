<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Reserve;
use App\Mail\RemindMail;
use Illuminate\Support\Facades\Mail;


class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:ReminderMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminder Mail in the Morning';

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
        $today = Carbon::today();
        $reserves= Reserve::with(['user','shop'])->Date($today)->get();
        foreach ($reserves as $reserve)
        {
            $title = (string)$reserve->Shop->name."からの予約確認メールです。";
            $name = $reserve->User->name;
            $email = $reserve->User->email;
            $shop = $reserve->Shop->name;
            $date = $reserve->date;
            $time = $reserve->time;
            $id = $reserve->id;
            Mail::send(new RemindMail($title,$shop,$name,$email,$date,$time,$id));
        }
    }
}
