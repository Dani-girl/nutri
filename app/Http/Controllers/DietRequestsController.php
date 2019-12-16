<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DietRequest;
use App\Allergy;
use App\User;

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
        $allergies = Allergy::all();
    	return view('pages.client.create_diet_request')->with(compact('allergies'));
    }

    // protected function store(Request $request){
    //     $requested = $request;
    //     $allergies = Allergy::all();
    //     $clientAllergies = array();
    //     $existingAllergies = array();
    //     $client = User::find(auth()->user()->id);
    //     // for ($i=0; $i < count($request->allergies); $i++) { 
    //     //     $clientAllergies[$i] = $request->allergies[$i];
    //     //     foreach ($allergies as $allergy) {
    //     //         if ($allergy->name == $request->allergies[$i]) {
    //     //             $client->roles()->attach($allergy->name);
    //     //         }else{

    //     //         }
    //     //     }
    //     // }
    //         for ($i=0; $i < count($request->allergies); $i++) {
    //         $clientAllergies[$i] = $request->allergies[$i];

    //         foreach ($allergies as $allergy) {
    //             if ($allergy->name == $request->allergies[$i]) {
    //                 //$client->allergy()->attach($allergy);
    //                 $clientAllergies[$i] = 'exists';
    //                 }
    //             }
    //         }
    //         // $broj=count($existingAllergies);
    //         // $existingAllergies[0]='mamamia';
    //         for ($i=0; $i < count($clientAllergies); $i++) { 
    //             if($clientAllergies[$i]!='exists'){
    //                 // if($existingAllergies==null){
    //                 //     $existingAllergies[0]==$clientAllergies[$i];
    //                 // }else{
    //                 //$broj = count($existingAllergies);
    //                 $existingAllergies[count($existingAllergies)] = $clientAllergies[$i];
    //                 //}
    //             }
    //         }
        
        
    //     return view('test')->with(compact('requested', 'existingAllergies', 'clientAllergies'));
    // }

    protected function store(Request $request){
    	$diet_request_fields = collect(['birth_year', 'sex', 'height', 'weight', 'blood_type', 'diet_type', 'physical_activity', 'past_diets_title', 'past_diets_description', 'past_diets_success_rate', 'meals_per_day', 'late_meal_time', 'sweets_consumption', 'alcohol_consumption', 'consuming_everyday']);
        $client = User::find(auth()->user()->id);
        $allergies = Allergy::all();
        $clientAllergies = array();
        $diet_request = new DietRequest;
        $diet_request -> client_id = auth()->user()->id;
        foreach ($diet_request_fields as $diet_request_field) {
        	$diet_request->$diet_request_field = $request->$diet_request_field;
        }
        $diet_request->save();

        // for ($i=0; $i < count($request->allergies); $i++) {
        //     $clientAllergies[$i] = $request->allergies[$i];
        //     foreach ($allergies as $allergy) {
        //         if ($allergy->name == $request->allergies[$i]) {
        //             $client->allergy()->attach($allergy);
        //             $clientAllergies[$i] = '';
        //         }else{
        //         $newAllergy = new Allergy;
        //         $newAllergy->name = $request->allergies[$i];
        //         $newAllergy->save();
        //         $client->allergy()->attach($newAllergy);
        //         }
        //     }
        // }
        for ($i=0; $i < count($request->allergies); $i++) {
            $clientAllergies[$i] = $request->allergies[$i];

            foreach ($allergies as $allergy) {
                if ($allergy->name == $request->allergies[$i]) {
                    $client->allergy()->attach($allergy);
                    $clientAllergies[$i] = 'exists';
                    }
                }
            }
            for ($i=0; $i < count($clientAllergies); $i++) { 
                if($clientAllergies[$i]!='exists'){
                    $newAllergy = new Allergy;
                    $newAllergy->name = $clientAllergies[$i];
                    $newAllergy->save();
                    $client->allergy()->attach($newAllergy);
                }
            }

        return redirect('home')->with('status', 'Your request has been sent, waiting for nutritionists response');
    }

    protected function showClient(){
    	$diet_request = DietRequest::where('client_id', (auth()->user()->id))->first();
    	return view('pages.client.show_clients_diet_request')->with(compact('diet_request'));
    }

    public function show($id){
    	$diet_request = DietRequest::find($id);
    	return view('pages.nutritionist.show_diet_request')->with(compact('diet_request'));
    }
}
