<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $menunggu = Registration::where('waktu_booking', '>=', Carbon::today())->where('status', '=', 'menunggu konfirmasi')->count();
        $terkonfirmasi = Registration::where('waktu_booking', '>=', Carbon::today())->where('status', '=', 'terkonfirmasi')->count();
        $berikut = Registration::where('waktu_booking', '>=', Carbon::today())
            ->where('status', 'terkonfirmasi')
            ->orderBy('waktu_booking', 'asc')
            ->first();
        $dashboard = [
            'menunggu' => $menunggu,
            'terkonfirmasi' => $terkonfirmasi,
            'berikut' => $berikut
        ];

        return view('dashboard.index', compact('dashboard'));
    }
}
