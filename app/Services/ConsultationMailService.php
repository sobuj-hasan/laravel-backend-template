<?php

namespace App\Services;

use App\Helpers\SettingHelper;
use App\Models\ConsultationForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationBookingConfirmation;
use App\Mail\ConsultationBookingNotification;

class ConsultationMailService
{
    /**
     * Send consultation booking emails
     */
    public static function sendBookingEmails(ConsultationForm $consultation)
    {
        // Send confirmation email to user
        self::sendUserConfirmation($consultation);
        
        // Send notification email to admin
        self::sendAdminNotification($consultation);
    }

    /**
     * Send confirmation email to user
     */
    private static function sendUserConfirmation(ConsultationForm $consultation)
    {
        try {
            Mail::to($consultation->email ?? 'user@example.com')
                ->send(new ConsultationBookingConfirmation($consultation));
        } catch (\Exception $e) {
            Log::error('Failed to send user confirmation email: ' . $e->getMessage());
        }
    }

    /**
     * Send notification email to admin
     */
    private static function sendAdminNotification(ConsultationForm $consultation)
    {
        try {
            $adminEmail = SettingHelper::contactEmail();
            if ($adminEmail) {
                Mail::to($adminEmail)
                    ->send(new ConsultationBookingNotification($consultation));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send admin notification email: ' . $e->getMessage());
        }
    }
}
