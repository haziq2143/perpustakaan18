<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyReturnReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:return-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $loans = Loan::where('return_date', $tomorrow)->get();

        foreach ($loans as $loan) {
            $user = $loan->user;
            $book = $loan->book;

            Mail::to($user->email)->send(new \App\Mail\ReturnReminderMail($user, $book, $loan));
            $this->info("Pengingat Dikirim ke $user->email");
        }
    }
}
