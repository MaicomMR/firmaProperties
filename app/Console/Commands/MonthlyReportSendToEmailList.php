<?php

namespace App\Console\Commands;

use App\Mail\MonthlyReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyReportSendToEmailList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mensal-report-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Mail::send(new MonthlyReport());
    }
}
