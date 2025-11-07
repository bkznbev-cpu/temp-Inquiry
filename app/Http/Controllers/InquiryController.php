<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the inquiries.
     */
    public function index()
    {
        $inquiries = Inquiry::paginate(10); // paginate results
        return view('inquiries.index', compact('inquiries'));
    }

    /**
     * Show the form for creating a new inquiry.
     */
    public function create()
    {
        return view('inquiries.create');
    }

    /**
     * Store a newly created inquiry in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Inquiry::create($request->all());

        return redirect()->route('inquiries.index')->with('success', 'Inquiry submitted successfully.');
    }

    /**
     * Show the form for editing the specified inquiry.
     */
    public function edit(Inquiry $inquiry)
    {
        return view('inquiries.edit', compact('inquiry'));
    }

    /**
     * Update the specified inquiry in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $inquiry->update($request->all());

        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated successfully.');
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
