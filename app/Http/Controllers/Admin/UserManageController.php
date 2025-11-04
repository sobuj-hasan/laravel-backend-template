<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsultationForm;
use Illuminate\Support\Carbon;

class UserManageController extends Controller
{
    // List unique customers derived from consultation_forms
    public function index(Request $request)
    {
        $customers = ConsultationForm::query()
            ->select('email')
            ->selectRaw('MAX(id) as latest_id')
            ->selectRaw('COUNT(*) as total_consultations')
            ->selectRaw('MAX(created_at) as last_consulted')
            ->groupBy('email')
            ->orderByRaw('MAX(created_at) DESC')
            ->paginate(10)
            ->through(function ($row) {
                $latest = ConsultationForm::find($row->latest_id);
                return (object) [
                    'email' => $row->email,
                    'name' => optional($latest)->full_name,
                    'total_consultations' => (int) $row->total_consultations,
                    'last_consulted' => $row->last_consulted,
                ];
            });

        return view('backend.users.index', compact('customers'));
    }

    // Show a single customer's details
    public function show(string $user)
    {
        $email = $user;
        $consultations = ConsultationForm::where('email', $email)
            ->orderByDesc('created_at')
            ->paginate(10);

        $latest = ConsultationForm::where('email', $email)->latest('created_at')->first();
        $name = optional($latest)->full_name;

        return view('backend.users.show', compact('email', 'name', 'consultations'));
    }

    // Edit a customer's basic info (name only for now)
    public function edit(string $user)
    {
        $email = $user;
        $latest = ConsultationForm::where('email', $email)->latest('created_at')->first();
        $name = optional($latest)->full_name;

        return view('backend.users.edit', compact('email', 'name'));
    }

    // Update will propagate name change to all consultations with this email
    public function update(Request $request, string $user)
    {
        $email = $user;
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
        ]);

        ConsultationForm::where('email', $email)->update(['full_name' => $validated['full_name']]);

        return redirect()->route('users.show', $email)->with('success', 'Customer updated successfully.');
    }

    // Delete all consultations for this customer (soft delete not used here)
    public function destroy(string $user)
    {
        $email = $user;
        ConsultationForm::where('email', $email)->delete();
        return redirect()->route('users.index')->with('success', 'Customer removed successfully.');
    }
}
