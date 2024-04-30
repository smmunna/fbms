<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function adminReport()
    {
        return view('pages.admin.report.report');
    }

    public function getReports(Request $request)
    {
        $type = $request->input('type');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        switch ($type) {
            case 'last7days':
                $data = $this->getLast7DaysReport();
                break;
            case 'lastMonth':
                $data = $this->getLastMonthReport();
                break;
            case 'currentMonth':
                $data = $this->getCurrentMonthReport();
                break;
            case 'all':
                $data = $this->getAllReports();
                break;
            case 'today':
                $data = $this->getTodayReport();
                break;
            case 'dateRange':
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');
                $data = $this->getDateRangeReport($startDate, $endDate);
                break;
            default:
                $data = [];
        }

        // Calculate total amount for the report
        $totalAmount = $data->sum('amount');
        $totalBooking = $data->count();

        return view('pages.admin.report.report', compact('data', 'totalAmount', 'totalBooking', 'type', 'startDate', 'endDate'));
    }

    private function getLast7DaysReport()
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->whereDate('orders.created_at', '>=', now()->subDays(7))
            ->get();
    }


    private function getTodayReport()
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->whereDate('orders.created_at', now()->toDateString()) // Filter by today's date
            ->get();
    }


    private function getLastMonthReport()
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->whereMonth('orders.created_at', '=', now()->subMonth()->month)
            ->get();
    }

    private function getCurrentMonthReport()
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->whereMonth('orders.created_at', '=', now()->month)
            ->get();
    }

    private function getAllReports()
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->get();
    }

    private function getDateRangeReport($startDate, $endDate)
    {
        return DB::table('orders')
            ->join('flats', 'orders.flat_id', '=', 'flats.flat_id')
            ->join('users', 'flats.owner_id', '=', 'users.id')
            ->select('orders.*', 'users.name as owner_name', 'users.phone as owner_phone', 'users.present_address as owner_address', 'flats.title as flat_title')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->get();
    }
}
