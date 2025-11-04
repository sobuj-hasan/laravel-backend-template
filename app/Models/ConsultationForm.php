<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationForm extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'service',
        'address',
        'design_file',
        'budget',
        'notes',
        'appointment_date',
        'appointment_time',
        'status'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'datetime:H:i',
    ];

    // Get formatted appointment date
    public function getFormattedAppointmentDateAttribute()
    {
        return $this->appointment_date->format('l, F j, Y');
    }

    // Get formatted appointment time
    public function getFormattedAppointmentTimeAttribute()
    {
        return \Carbon\Carbon::parse($this->appointment_time)->format('g:i A');
    }

    // Get service display name
    public function getServiceDisplayNameAttribute()
    {
        $services = [
            'bedroom' => 'Bedroom Design',
            'living-room' => 'Living Room Design',
            'dining-room' => 'Dining Room Design',
            'kitchen' => 'Kitchen Design',
            'office' => 'Office Design',
            'bathroom' => 'Bathroom Design',
            'exterior' => 'Exterior Design',
        ];

        return $services[$this->service] ?? ucfirst($this->service);
    }

    // Get budget display name
    public function getBudgetDisplayNameAttribute()
    {
        $budgets = [
            'under-10k' => 'Under R10,000',
            '10k-15k' => 'R10,000 - R15,000',
            '15k-25k' => 'R15,000 - R25,000',
            '25k-50k' => 'R25,000 - R50,000',
            '50k-100k' => 'R50,000 - R100,000',
            'over-100k' => 'Over R100,000',
        ];

        return $budgets[$this->budget] ?? ucfirst($this->budget);
    }
}
