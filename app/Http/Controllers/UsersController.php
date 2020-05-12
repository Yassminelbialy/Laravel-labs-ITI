<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use \App\User;

class UsersController extends Controller
{
    public function add($id)
    {
        User::find(auth()->user()->id)->contacts()->syncWithoutDetaching([$id]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find(auth()->user()->id)->contacts()->detach([$id]);
        return redirect("/home");
    }
}
