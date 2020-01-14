<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Roles;
use App\Nutritionist;
use App\User;
use App\NutritionistRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedNutritionistRequest;

class NutritionistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function index(){
        $nutritionists = Nutritionist::all();
        return view('pages.admin.nutritionists')->with(compact('nutritionists'));
    }

    protected function store(Request $request){
		$nutritionist_request = NutritionistRequest::find($request->id);
        $data = (object) $nutritionist_request;
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => $data['password'],
        ]);
        $user->role = 3;
        $user->save();
        $user_id = $user->id;
        $nutritionist = Nutritionist::create([
        	'user_id'   => $user_id,
        	'photo'		=> $data['photo'],
            'education' => $data['education'],
            'expertise' => $data['expertise'],
            'diploma'	=> $data['diploma'],
            'experience'=> $data['experience'],
            'summary'	=> $data['summary']
        ]);
        $nutritionist_request->delete();

        //Mail::send(new ApprovedNutritionistRequest($user));

        return redirect('nutritionist-requests')->with('message', 'Approved succesfully!');
    }

    public function show($id){
        $nutritionist = Nutritionist::find($id);
        return view('pages.admin.show_nutritionist')->with(compact('nutritionist'));
    }
}
