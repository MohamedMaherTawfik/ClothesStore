<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\admin\apiResponse;
use App\Http\Controllers\Controller;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class MailController extends Controller
{
    use apiResponse;
    public function sendEmail(Request $request)
    {
        $send=Mail::to(Auth::user()->email)->send(new sendMail());

        return $this->apiResponse($send,__('messages.emailsent'));
    }
}

