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

    private $emails;
    private $reportProcessDate;
    private $totalEstatesValue;
    private $totalEstatesCount;
    private $newEstatesOnLast30Days;
    private $lastMonth;
    private $topValueEstatesAddedOnLastMonth;
    private $lastMonthWriteOffEstates;
    private $totalUnassignedEstatesCount;
    private $destinationEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emails, $reportProcessDate, $totalEstatesValue, $totalEstatesCount, $newEstatesOnLast30Days,
                                $lastMonth, $topValueEstatesAddedOnLastMonth, $lastMonthWriteOffEstates, $totalUnassignedEstatesCount,
                                $destinationEmail)
    {
        $this->emails = $emails;
        $this->reportProcessDate = $reportProcessDate;
        $this->totalEstatesValue = $totalEstatesValue;
        $this->totalEstatesCount = $totalEstatesCount;
        $this->newEstatesOnLast30Days = $newEstatesOnLast30Days;
        $this->lastMonth = $lastMonth;
        $this->topValueEstatesAddedOnLastMonth = $topValueEstatesAddedOnLastMonth;
        $this->lastMonthWriteOffEstates = $lastMonthWriteOffEstates;
        $this->totalUnassignedEstatesCount = $totalUnassignedEstatesCount;
        $this->destinationEmail = $destinationEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $destinationEmail = $this->destinationEmail;

        $emails = $this->emails;
        $reportProcessDate = $this->reportProcessDate;
        $totalEstatesValue = $this->totalEstatesValue;
        $totalEstatesCount = $this->totalEstatesCount;
        $newEstatesOnLast30Days = $this->newEstatesOnLast30Days;
        $lastMonth = $this->lastMonth;
        $topValueEstatesAddedOnLastMonth = $this->topValueEstatesAddedOnLastMonth;
        $lastMonthWriteOffEstates = $this->lastMonthWriteOffEstates;
        $totalUnassignedEstatesCount = $this->totalUnassignedEstatesCount;

        $this->subject('Relatório Mensal - Estate Care');
        $this->from('estatecare@gmail.com', 'EstateCare');

        return $this->view('mail.monthlyReport', compact([
            'emails',
            'reportProcessDate',
            'totalEstatesValue',
            'totalEstatesCount',
            'newEstatesOnLast30Days',
            'lastMonth',
            'topValueEstatesAddedOnLastMonth',
            'lastMonthWriteOffEstates',
            'totalUnassignedEstatesCount']));
    }
}
