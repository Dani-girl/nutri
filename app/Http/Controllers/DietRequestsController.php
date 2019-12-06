<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DietRequest;

class DietRequestsController extends Controller
{
	public function myDietQuery(){
		$diet_request = DietRequest::where('client_id', auth()->user()->id)->first();
		$return_path = '';
		if($diet_request==null){
			$return_path = redirect('diet-request/create');
		}elseif($diet_request->nutritionist_id==null){
			$return_path = redirect('diet-request');
		}else{
			$return_path = redirect('my-diet');
		}

		return $return_path;
	}

    public function index(){
    	$diet_requests = DietRequest::all();
    	return view('pages.nutritionist.diet_requests')->with(compact('diet_requests'));
    }

    public function create(){
    	return view('pages.client.create_diet_request');
    }

    protected function store(Request $request){
    	$diet_request_fields = collect(['birth_year', 'sex', 'height', 'weight', 'blood_type', 'diet_type', 'physical_activity', 'past_diets_title', 'past_diets_description', 'past_diets_success_rate', 'meals_per_day', 'late_meal_time', 'sweets_consumption', 'alcohol_consumption', 'consuming_everyday']);
        $diet_request = new DietRequest;
        $diet_request -> client_id = auth()->user()->id;
        foreach ($diet_request_fields as $diet_request_field) {
        	$diet_request->$diet_request_field = $request->$diet_request_field;
        }
        $diet_request->save();

        return redirect('home')->with('status', 'Your request has been sent, waiting for nutritionists response');
    }

    protected function showClient(){
    	$diet_request = DietRequest::find(auth()->user()->id);
    	return view('pages.client.show_clients_diet_request')->with(compact('diet_request'));
    }

    public function show($id){
    	$diet_request = DietRequest::find($id);
    	return view('pages.nutritionist.show_diet_request')->with(compact('diet_request'));
    }
}
