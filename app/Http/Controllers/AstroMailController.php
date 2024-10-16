<?php

namespace App\Http\Controllers;

use App\Mail\AstroMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AstroMailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Levél címe',
            'body' => 'Levél törzse'
        ];
        Mail::to('asd@gmail.com')
            /* ->cc($moreUsers)
                    ->bcc($evenMoreUsers) */
            ->send(new AstroMail($mailData));

        dd("Email küldése sikeres.");
    }


}
