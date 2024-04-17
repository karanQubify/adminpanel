<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Technology, TechnologyList, Industry, IndustryList, Service, ServiceList};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $technologies = Technology::with('technology')->get();
        // $services = Service::with('service')->get();
        // $industries = Industry::with('industry')->get();
        // echo"<pre>";
        // print_r($technologies);
        // die();
        return view('welcome');
    }

    public function technologyInfo(){
        return view('technology');
    }

    public function serviceInfo(){
        return view('technology');
    }

    public function solutionInfo(){
        return view('technology');
    }

    public function industryInfo(){
        return view('technology');
    }
}
