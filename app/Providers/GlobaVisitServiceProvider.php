<?php

namespace App\Providers;

use App\Models\Tbl_identitas;
use App\Models\Tbl_pengunjung;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobaVisitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($views) {
            $visit = new Tbl_pengunjung();
            $info = Tbl_identitas::first();

            $views->with([
                'visitToday' => $visit->where('tgl_kunjung', date('Y-m-d'))->count(),
                'totalVisit' => $visit->count(),
                'info' => $info
            ]);
        });
    }
}
