<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function update(){
        $user = \App\User::findOrFail(auth()->user()->id);
        $user->address = request("address");
        $user->save();
        
        return redirect("/home");
    }
}
