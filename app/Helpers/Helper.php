<?php

use App\Models\{Technology, TechnologyList, Industry, IndustryList, Service, ServiceList};

class Helper{
    public static function navbarMenu(){
        $technologies = Technology::with('technology')->get();
        $services = Service::with('service')->get();
        $industries = Industry::with('industry')->get();
        $navbarmenu = [
            'technologies' => $technologies,
            'services' => $services,
            'industries' => $industries
        ];
        return $navbarmenu;
    }

    public static function technologyList(){
        $technologylist = TechnologyList::all();
        return $technologylist;
    }

    public static function serviceList(){
        $servicelist = ServiceList::all();
        return $servicelist;
    }

    public static function industryList(){
        $industrylist = IndustryList::all();
        return $industrylist;
    }
}