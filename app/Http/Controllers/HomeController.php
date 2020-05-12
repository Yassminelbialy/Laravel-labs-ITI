<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Mobile_phones;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phones = auth()->user()->phoneNumbers;
        $users = \App\User::where('id', '!=', auth()->id())->get();
        $contacts = auth()->user()->contacts()->get();
        return view('home.home', [
            'phones' => $phones,
            'users' => $users,
            'contacts' => $contacts,
        ]);
    }
}
