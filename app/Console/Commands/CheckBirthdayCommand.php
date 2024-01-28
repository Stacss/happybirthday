<?php

namespace App\Console\Commands;

use App\Mail\BirthdayGreeting;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckBirthdayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:check';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Check if it\'s Maria Petrova-Berezovskaya\'s birthday today';
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
        $today = Carbon::now()->format('m-d');

        $maria = Client::where([
            'first_name' => 'Мария',
            'last_name' => 'Петрова-Березовская',
            'birthdate' => '1949-01-28',
        ])->first();

        if ($maria && Carbon::parse($maria->birthdate)->format('m-d') == $today) {
            Mail::to('postnikov.sa@ya.ru')->queue(new BirthdayGreeting());

            $this->info('Birthday greeting sent to administrator!');
        } else {
            $this->info('Today is not Maria Petrova-Berezovskaya\'s birthday!');
        }
    }
}
