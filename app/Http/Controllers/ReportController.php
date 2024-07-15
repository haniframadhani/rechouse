<?php

namespace App\Http\Controllers;

use App\Charts\ReportChart;
use App\Models\Registration;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
  /**
   * report
   *
   * @param  mixed $request
   * @return View
   */
  public function report(Request $request): View
  {
    $chart = new ReportChart;
    $chart->labels(['terkonfirmasi', 'menunggu konfirmasi', 'selesai', 'batal']);
    $chart->minimalist(true);
    $chart->displayLegend(false);
    $chart->barWidth(0);
    
    $statuses = ['terkonfirmasi', 'menunggu konfirmasi', 'selesai', 'batal'];
    $statusCounts = [];

    if($request->query('start') == null && $request->query('end') == null) {
      $startDate = $request->query('start') ? $request->query('start') : Carbon::today()->subDays(7);
      $endDate = $request->query('end') ? $request->query('end') : Carbon::today();
      $range = [$startDate, $endDate];
      
      foreach($statuses as $status) {
        $statusCounts[$status] = Registration::where('status', $status)->whereBetween('waktu_booking', [$startDate, $endDate])->count();
      }
      
      $reports = Registration::whereBetween('waktu_booking', [$startDate, $endDate]);
      $chart->dataset('laporan pelanggan', 'doughnut', [$statusCounts[$statuses[0]],$statusCounts[$statuses[1]],$statusCounts[$statuses[2]],$statusCounts[$statuses[3]]])->backgroundColor(['rgb(14, 165, 233)','rgb(234, 179, 8)','rgb(34, 197, 94)','rgb(239, 68, 68)']);

      return view('report', compact('range', 'reports', 'chart', 'statusCounts'));
    }

    try{
      $startDate = Carbon::parse($request->query('start'));
      $endDate = Carbon::parse($request->query('end'));
    }catch(\Exception $e) {
      $startDate = Carbon::today()->subDays(7);
      $endDate = Carbon::today();
    }
    
    $range = [$startDate, $endDate];
    foreach($statuses as $status) {
      $statusCounts[$status] = Registration::where('status', $status)->whereBetween('waktu_booking', [$startDate > $endDate ? $endDate : $startDate, $startDate < $endDate ? $endDate : $startDate])->count();
    }
    
    $reports = Registration::whereBetween('waktu_booking', [$startDate > $endDate ? $endDate : $startDate, $startDate < $endDate ? $endDate : $startDate])->orderBy('waktu_booking', 'desc');
    $chart->dataset('laporan pelanggan', 'doughnut', [$statusCounts[$statuses[0]],$statusCounts[$statuses[1]],$statusCounts[$statuses[2]],$statusCounts[$statuses[3]]])->backgroundColor(['rgb(14, 165, 233)','rgb(234, 179, 8)','rgb(34, 197, 94)','rgb(239, 68, 68)']);
    
    return view('report', compact('range', 'reports', 'chart', 'statusCounts'));
  }
}