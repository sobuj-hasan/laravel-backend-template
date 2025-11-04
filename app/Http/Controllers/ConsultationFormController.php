<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Services\ConsultationMailService;
use Illuminate\Support\Facades\Validator;

class ConsultationFormController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|in:bedroom,living-room,dining-room,kitchen,office,bathroom,exterior',
            'address' => 'required|string|max:500',
            'designFile' => 'nullable|file|mimes:pdf,jpg,jpeg,png,dwg,skp|max:10240', // 10MB max
            'budget' => 'required|string',
            'notes' => 'nullable|string|max:1000',
            'appointmentDate' => 'required|date',
            'appointmentTime' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $designFilePath = null;      
            
            // Handle file upload
            if ($request->hasFile('designFile')) {
                $file = $request->file('designFile');
                $designFilePath = $file->store('consultation-files', 'public');
            }

            // Create consultation form record
            $consultation = ConsultationForm::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'service' => $request->service,
                'address' => $request->address,
                'design_file' => $designFilePath,
                'budget' => $request->budget,
                'notes' => $request->notes,
                'appointment_date' => $request->appointmentDate,
                'appointment_time' => $request->appointmentTime,
                'status' => 'pending'
            ]);

            // Send email to admin and user
            ConsultationMailService::sendBookingEmails($consultation);

            return redirect()->route('consultation.success', $consultation->id)
                ->with('success', 'Your consultation has been booked successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.')
                ->withInput();
        }
    }

    public function success(ConsultationForm $consultation)
    {
        return view('frontend.pages.consultation-success', compact('consultation'));
    }
}
