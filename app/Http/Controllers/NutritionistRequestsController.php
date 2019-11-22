<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Roles;
use App\NutritionistRequest;
use Illuminate\Support\Facades\Hash;

class NutritionistRequestsController extends Controller
{
    public function index(){
        $requests = NutritionistRequest::all();
        return view('pages.admin.nutritionist_requests')->with(compact('requests'));
    }

    public function create(){
    	return view('auth.join-our-team');
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

    // protected function showTobeWL($id){
    //     $tobe = Tobe::find($id);
    //     $role = auth() -> user() -> isAdmin;

    //     if( $role !== Roles::ADMIN && $role !== Roles::SUPERADMIN){
    //         return redirect('/home') -> with('error', 'Unauthorized Page');
    //     }

    //     return view('auth.showwl')->with('tobe', $tobe);
    // }

    public function show($id){
        $request = NutritionistRequest::find($id);
        $role = auth() -> user() -> isAdmin;

        // if( $role !== Roles::ADMIN && $role !== Roles::SUPERADMIN){
        //     return redirect('/home') -> with('error', 'Unauthorized Page');
        // }

        return view('pages.admin.show_nutritionist_request')->with(compact('request'));
    }
}
