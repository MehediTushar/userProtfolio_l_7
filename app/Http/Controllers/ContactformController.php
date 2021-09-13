<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShippedContactFromMail;

class ContactformController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store()
    {
        $contact_from=request()->all();
        Mail::to('mehedituhsar@gmail.com')->send(new OrderShippedContactFromMail($contact_from));
        return redirect()->route('home','/#contact')->with('success','Your message has been submitted successfully');
    }
}
