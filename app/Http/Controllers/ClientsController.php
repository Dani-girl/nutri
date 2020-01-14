<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientsController extends Controller
{
	public function __construct()
    {
        $this->middleware('checkAdmin');
    }
    
    public function index(){
    	$clients = User::where('role', 4)->get();
    	return view('pages.admin.clients')->with(compact('clients'));
    }

    public function show($id){
    	$client = User::find($id);
    	return view('pages.admin.show_client')->with(compact('client'));
    }
}
