<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ConsultationForm;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_contact_messages = ContactMessage::count();
        $total_services = 7;
        $total_consultations = ConsultationForm::count();

        // Define the canonical service slugs and display names
        $serviceSlugToName = [
            'bedroom' => 'Bedroom Service',
            'living-room' => 'Living Room Service',
            'dining-room' => 'Dining Room Service',
            'kitchen' => 'Kitchen Service',
            'office' => 'Office Service',
            'bathroom' => 'Bathroom Service',
            'exterior' => 'Exterior Service',
        ];

        // Budget code to human label, aligned with \App\Models\ConsultationForm accessor
        $budgetCodeToLabel = [
            'under-10k' => 'Under R10,000',
            '10k-15k' => 'R10,000 - R15,000',
            '15k-25k' => 'R15,000 - R25,000',
            '25k-50k' => 'R25,000 - R50,000',
            '50k-100k' => 'R50,000 - R100,000',
            'over-100k' => 'Over R100,000',
        ];

        // Calculate counts and most common budget per service
        $totalMessages = max(ConsultationForm::count(), 1); // avoid divide-by-zero

        $colorClasses = [
            'bg-indigo-600',
            'bg-green-500',
            'bg-blue-500',
            'bg-purple-500',
            'bg-orange-500',
            'bg-pink-500',
            'bg-teal-500',
        ];

        $top_services = [];
        $colorIndex = 0;
        foreach ($serviceSlugToName as $serviceSlug => $serviceName) {
            $query = ConsultationForm::query()->where('service', $serviceSlug);
            $count = (clone $query)->count();

            // Determine most frequent budget for this service
            $budgetMode = (clone $query)
                ->select('budget')
                ->groupBy('budget')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->value('budget');

            $budgetDisplay = $budgetCodeToLabel[$budgetMode] ?? ($budgetMode ? ucfirst($budgetMode) : 'N/A');

            $percent = (int) round(($count / $totalMessages) * 100);

            $top_services[] = [
                'name' => $serviceName,
                'count' => $count,
                'percent' => $percent,
                'budget_label' => $budgetDisplay,
                'color_class' => $colorClasses[$colorIndex % count($colorClasses)],
            ];

            $colorIndex++;
        }

        // Sort by highest count (messages) first
        usort($top_services, function ($a, $b) {
            return $b['count'] <=> $a['count'];
        });

        $consultations = ConsultationForm::orderBy('created_at', 'desc')->paginate(10);

        return view('backend.dashboard', get_defined_vars());
    }

    
}


