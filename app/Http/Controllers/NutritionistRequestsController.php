<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutritionistRequestsController extends Controller
{
    public function create(){

    }

    protected function store(Request $request){
        $this->validate(request(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        
        $data = (object) $request;
        $tobe = NutritionistRequest::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'photo'		=> $data['photo'],
            'education' => $data['education'],
            'expertise'	=> $data['expertise'],
            'diploma'	=> $data['diploma'],
            'experience'=> $data['experience'],
            'summary'	=> $data['summary']
        ]);
        //Mail::send(new NewRequest($tobe));
        return redirect('waiting-for-approval')->with('status', "Waiting for admin's approval!");
    }
}
