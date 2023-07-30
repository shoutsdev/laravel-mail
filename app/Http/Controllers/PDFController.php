<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailExample;
use PDF;
use Mail;

class PDFController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["email"] = "demomail@gmail.com";
        $data["title"] = "From shouts.dev";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('emails.myTestMail', $data);
        $data["pdf"] = $pdf;

        Mail::to($data["email"])->send(new MailExample($data));

        dd('Mail sent successfully');
    }

}
