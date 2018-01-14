<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendContactEmailRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Send contact email message
     *
     * @param SendContactEmailRequest $request
     *
     * @return string
     */
    public function sendContactEmail(SendContactEmailRequest $request)
    {
        Mail::to(env('APP_EMAIL'))
            ->send(new ContactMessage($request
                ->only(['name', 'email', 'subject', 'message'])));

        return 'Your message was successfully sent. Thank you!';
    }
}
