<?php

namespace App\Console\Commands;

use App\EstateModel;
use App\Mail\DayEstateValueAlert;
use App\Mail\MonthlyReport;
use App\MailingListModel;
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

        $emails = MailingListModel::all()->where('monthReports', '=', '1');

        \Carbon\Carbon::setLocale('pt_BR');
        $reportProcessDate = now()->timezone('America/Sao_Paulo')->isoFormat('h:mm:ss a - D MMMM YYYY');;
        $lastMonth = now()->subMonth(1)->isoFormat('MMMM');

        $dateTime = now()->isoFormat('YYYY-MM-D h:mm:ss');

        $totalEstatesValue = EstateModel::sum('value');
        $totalEstatesCount = EstateModel::count('id');
        $newEstatesOnLast30Days = EstateModel::all()->where('created_at', '>', now()->subDays(30))->count();

        $topValueEstatesAddedOnLastMonth = EstateModel::orderBy('value', 'DESC')->where('created_at', '>', now()->subDays(30))->take(10)->get();
        $lastMonthWriteOffEstates = EstateModel::onlyTrashed()->where('deleted_at', '>', now()->subDays(30))->count();
        $totalUnassignedEstatesCount = EstateModel::where('employee_id', '=', null)->count();

        foreach ($emails as $destinationEmail) {
            Mail::to($destinationEmail->email)->send(new MonthlyReport(
                $emails,
                $reportProcessDate,
                $totalEstatesValue,
                $totalEstatesCount,
                $newEstatesOnLast30Days,
                $lastMonth,
                $topValueEstatesAddedOnLastMonth,
                $lastMonthWriteOffEstates,
                $totalUnassignedEstatesCount,
                $destinationEmail));
        }
    }
}
