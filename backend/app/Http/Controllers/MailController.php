<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index()
    {
        $mailData = [
            'title' => 'Hello World',
            'body' => 'This is a test email from Laravel'
        ];
        Mail::to("senghak.chhun@student.passerellesnumeriques.org")->send(new DemoMail($mailData));
        dd("Memail Sent!");
    }
}
