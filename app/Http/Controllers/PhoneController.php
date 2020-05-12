<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile_phones;
use SoftDeletes;
use App\Http\Requests\PhoneValidator;

class PhoneController extends Controller
{
    public function edit($id){
        $phone = Mobile_phones::findOrFail($id);

        return view("home.editPhone",["phone"=>$phone]);
    }

    public function update(PhoneValidator $request, $id){

        $phone = Mobile_phones::findOrFail($id);
        $phone->phone = request("new_phone");
        $phone->save();

        return redirect("/home");
    }

    public function store(PhoneValidator $request){
        $phone = new Mobile_phones();
        $phone->phone = request("phone");
        $phone->user = auth()->user()->id;
        $phone->save();

        return redirect("/home")->with('success', 'Your Phone Number Has Been Added Successfully');
    }

    public function destroy($id){
        $phone = Mobile_phones::findOrFail($id);
        $phone->delete();

        return redirect("/home");
    }
}
