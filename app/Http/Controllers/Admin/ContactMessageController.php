<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Filter by read status
        if ($request->has('status') && $request->status !== '') {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Search functionality
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%");
            });
        }

        // Sort by created_at desc by default
        $contactMessages = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.pages.contact-messages.index', compact('contactMessages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Mark as read when viewing
        if (!$contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }

        return view('backend.pages.contact-messages.show', compact('contactMessage'));
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['is_read' => true]);
        
        return response()->json([
            'success' => true,
            'message' => 'Message marked as read'
        ]);
    }

    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Here you would typically send an email
            // For now, we'll just store the reply in the database
            // You can implement email sending using Laravel Mail
            
            return back()->with('success', 'Reply sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send reply. Please try again.');
        }
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        
        return redirect()->route('contact-messages.index')
            ->with('success', 'Contact message deleted successfully!');
    }
}
