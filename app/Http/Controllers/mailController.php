<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\demoMail;

class mailController extends Controller
{
    //

    public function index(){
        $mailData = [
            'title' => 'Mail from lara-admin',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla aliquid iusto ab laboriosam! Voluptatibus?'
        ];

        Mail::to('irfannsadiq@gmail.com')->send(new demoMail($mailData));

        dd('Email Sent successfully!!');
    }
}
