<?php

namespace App\Http\Controllers;

use App\Mail\InfoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function homepage() {
        return view('homepage');
    }
    public function contact() {
        return view('contact');
    }
    public function send(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        Mail::to($request->email)->send(new InfoMail($data));
    }
}
