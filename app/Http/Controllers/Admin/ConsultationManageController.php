<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ConsultationForm;
use App\Http\Controllers\Controller;

class ConsultationManageController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_contact_messages = ContactMessage::count();
        $total_services = 7;
        $total_consultations = ConsultationForm::count();
        
        $consultations = ConsultationForm::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.appointment.index', get_defined_vars());
    }

    public function show(ConsultationForm $consultation)
    {
        return view('backend.pages.appointment.show', compact('consultation'));
    }

    public function edit(ConsultationForm $consultation)
    {
        return view('backend.pages.appointment.edit', compact('consultation'));
    }

    public function update(Request $request, ConsultationForm $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $consultation->update($validated);

        return redirect()->route('admin.consultations.index')
            ->with('success', 'Consultation status updated.');
    }

    public function destroy(ConsultationForm $consultation)
    {
        $consultation->delete();

        return back()->with('success', 'Consultation deleted.');
    }
}
