<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required|max:255',
        ]);

        $inquiry = new Inquiry();
        $inquiry->user_id = Auth::id();
        $inquiry->name = $request->input('name');
        $inquiry->email = $request->input('email');
        $inquiry->message = $request->input('message');

        $inquiry->save();
        return redirect()->back()->with('success', 'Inquiry Sent Successfully');
    }

    public function get_inquiries()
    {
        $inquiries = Inquiry::all();
        return view('admin_side.inquiries', compact('inquiries'));
    }


    public function destroy($category_id)
    {
        $inquiry = Inquiry::find($category_id);

        // Check if the category exists
        if ($inquiry) {
            // Delete the category
            $inquiry->delete();
            return redirect()->back()->with('success', 'Inquiry deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Inquiry not found');
        }
    }

    public function viewMessage($inquiry_id)
    {
        // Fetch appointment details using the $client_id
        $inquiry = Inquiry::where('inquiry_id', $inquiry_id)->first();

        return view('admin_side.view_message', compact('inquiry'));
    }

    //admin
    public function updateStatus(Request $request, $inquiry_id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);

        // Update the status of the appointment
        $inquiry = Inquiry::where('inquiry_id', $inquiry_id)->first();
        $inquiry->status = $request->input('status');
        $inquiry->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function messageReply(Request $request, $inquiry_id)
    {
        $request->validate([
            'reply' => 'nullable|string',
        ]);

        $inquiry = Inquiry::where('inquiry_id', $inquiry_id)->first();
        $inquiry->reply = $request->input('reply');
        $inquiry->name = ''; // Provide a default value or get it from the form
        $inquiry->save();

        // Store the reply message for the user
        $user = Auth::user();
        $user->replyMessages()->create([
            'inquiry_id' => $inquiry->id,
            'reply' => $request->input('reply'),
        ]);

        return redirect()->back()->with('success', 'Reply sent successfully');
    }

}
