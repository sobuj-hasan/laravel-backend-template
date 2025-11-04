<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function bedroom(){
        return view('frontend.pages.bedroom');
    }

    public function livingRoom(){
        return view('frontend.pages.living-room');
    }

    public function diningRoom(){
        return view('frontend.pages.dining-room');
    }

    public function kitchen(){
        return view('frontend.pages.kitchen');
    }

    public function bathRoom(){
        return view('frontend.pages.bathroom');
    }

    public function exterior(){
        return view('frontend.pages.exterior');
    }

    public function office(){
        return view('frontend.pages.office');
    }

    public function booking(){
        return view('frontend.pages.booking');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function storeContactMessage(Request $request)
    {
        // Validation rules
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'service' => 'nullable|string|max:255',
            'projectDetails' => 'nullable|string|max:2000',
            'budget' => 'nullable|string|max:100',
            'contactMethod' => 'required|string|in:email,phone,whatsapp'
        ]);

        try {
            // Create contact message
            $contactMessage = ContactMessage::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'service' => $request->service,
                'project_details' => $request->projectDetails,
                'budget' => $request->budget,
                'contact_method' => $request->contactMethod,
                'is_read' => false
            ]);

            // Display a success toast with no title
            flash()->success('Message sent successfully.');

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Message not sent. Please try again later.');
        }
    }

}
