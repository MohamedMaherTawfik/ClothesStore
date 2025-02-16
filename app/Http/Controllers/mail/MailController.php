<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to($request->to)->send(new sendMail($details));

        return response()->json(['message' => 'Email sent successfully']);
    }
}
