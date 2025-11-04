<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorAnalyticsController extends Controller
{
    public function index(){
        $visitorLogs = VisitorLog::orderBy('created_at', 'desc')->limit(10)->get();

        $total_visitors = VisitorLog::count();
        // Unique counts (ignore NULLs explicitly)
        $total_unique_visitors = VisitorLog::whereNotNull('ip_address')->distinct('ip_address')->count('ip_address');
        $total_unique_sessions = VisitorLog::whereNotNull('session_id')->distinct('session_id')->count('session_id');

        // Service-specific counts by URL path (since route_name is the tracker route)
        $servicePaths = [
            '/bedroom-service' => 'bedroom-service',
            '/living-room-service' => 'living-room-service',
            '/dining-room-service' => 'dining-room-service',
            '/kitchen' => 'kitchen-service',
            '/bathroom' => 'bathroom-service',
            '/exterior' => 'exterior-service',
            '/office' => 'office-service',
        ];
        $serviceCounts = [];
        foreach ($servicePaths as $path => $key) {
            $serviceCounts[$key] = VisitorLog::where('referer', 'like', "%{$path}%")->count();
        }

        // Time series for chart (daily last 30 days, weekly last 12 weeks, monthly last 12 months, yearly last 5 years)
        $daily = VisitorLog::selectRaw('DATE(created_at) as d, COUNT(*) as c')
            ->where('created_at', '>=', now()->subDays(29)->startOfDay())
            ->groupBy('d')->orderBy('d')->get();
        $weekly = VisitorLog::selectRaw('YEARWEEK(created_at, 3) as w, COUNT(*) as c')
            ->where('created_at', '>=', now()->subWeeks(11)->startOfWeek())
            ->groupBy('w')->orderBy('w')->get();
        $monthly = VisitorLog::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as m, COUNT(*) as c')
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('m')->orderBy('m')->get();
        $yearly = VisitorLog::selectRaw('YEAR(created_at) as y, COUNT(*) as c')
            ->where('created_at', '>=', now()->subYears(4)->startOfYear())
            ->groupBy('y')->orderBy('y')->get();

        // Prepare arrays for the view
        $daily_labels = $daily->pluck('d')->map(fn($d)=>\Carbon\Carbon::parse($d)->format('Y-m-d'));
        $daily_values = $daily->pluck('c');
        $weekly_labels = $weekly->pluck('w');
        $weekly_values = $weekly->pluck('c');
        $monthly_labels = $monthly->pluck('m');
        $monthly_values = $monthly->pluck('c');
        $yearly_labels = $yearly->pluck('y');
        $yearly_values = $yearly->pluck('c');

        return view('backend.pages.visitor-analytics.index', get_defined_vars());
    }
}
