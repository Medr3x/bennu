<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;
class DailyReportSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:daily-report-subcriptions {YYYY-MM-DD}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recibe un parámetro del tipo fecha "YYYY-MM-DD" para generar un informe sumarizado sobre otras tablas que contenga: cantidad de nuevas suscripciones en el día, cantidad de suscripciones canceladas en el día , cantidad de suscripciones activas totales al final del día.';

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
        $date_now = $this->argument('YYYY-MM-DD');
        $date_from = Carbon::parse($date_now.' 00:00:00')->format('Y-m-d H:i:s');
        $date_to = Carbon::parse($date_now.' 23:59:59')->format('Y-m-d H:i:s');

        $nuevas_hoy = Subscription::where('created_at','>=', $date_from)
                                ->where('created_at','<=',$date_to)
                                ->where('active','1')
                                ->get()
                                ->count();

        $canceladas_hoy = Subscription::where('created_at','>=', $date_from)
                                ->where('created_at','<=',$date_to)
                                ->where('active','0')
                                ->get()
                                ->count();

        $totales_activas = Subscription::where('active','1')
                                ->get()
                                ->count();
        $response = [
            'nuevas_hoy' => $nuevas_hoy,
            'canceladas_hoy' => $canceladas_hoy,
            'totales_activas' => $totales_activas
        ];

        \Log::info($response);

        return true;
    }
}
