<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Roles;

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
        $role = auth()->user()->role;
        $home = '';
        if($role==Roles::ADMIN || $role == Roles::SUPERADMIN){
            $home = view('pages.admin.home');
        }else if($role==Roles::NUTRITIONIST){
            $home = view('pages.nutritionist.home');
        }else{
            $home = view('pages.client.home');
        }
        return $home;
    }
}
