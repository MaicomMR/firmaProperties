<?php

namespace App\Mail;

use App\EstateModel;
use App\MailingListModel;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthlyReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
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

        foreach ($emails as $email){

            $this->subject('Relatório Mensal - Estate Care');
            $this->to($email->email, 'Maicom');
            $this->from('estatecare@gmail.com', 'EstateCare');
        }
        return $this->view('mail.monthlyReport', compact([
            'emails',
            'reportProcessDate',
            'totalEstatesValue',
            'totalEstatesCount',
            'newEstatesOnLast30Days',
            'lastMonth',
            'topValueEstatesAddedOnLastMonth']));
    }
}
