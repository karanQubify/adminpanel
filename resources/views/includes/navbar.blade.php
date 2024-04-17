<?php

$navbarmenu = \Helper::navbarMenu();

$technologies = isset($navbarmenu['technologies']) ? $navbarmenu['technologies'] : '';
$services = isset($navbarmenu['services']) ? $navbarmenu['services'] : '';
$industries = isset($navbarmenu['industries']) ? $navbarmenu['industries'] : '';
$solutions = isset($navbarmenu['solutions']) ? $navbarmenu['solutions'] : '';

?>

<nav class="fixed-top" id="menu">
    <div class="container-fluid">
        <div class="main_new_menu">
            <a class="pull-left" href="http://127.0.0.1:8000/home">
                <img width="173" height="36" class="img-fluid logo"
                    src="{{ asset('mainimages/qubify_white_logo.png') }}"
                    data-lazy-src="{{ asset('mainimages/qubify_white_logo.png') }}"><noscript><img
                        width="173" height="36" class="img-fluid logo"
                        src="{{ asset('mainimages/qubify_white_logo.png') }}"></noscript>
            </a>
            <div class="menu_menu">
                @if(!empty($solutions))
                <ul class="menu-item">
                    <li class="menu-text">
                        <a class="menu_text-a" href="{{route('solution.info')}}">Solutions</a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="sub-menu sub_m_menu">
                                    <div class="sub-menu double three">
                                        @foreach($solutions as $technology)
                                            <div class="box">
                                                <h5>{{ $technology->name }}</h5>
                                                @foreach($technology->technology as $tech)
                                                    <a
                                                        href="#">
                                                        <li class="icon-box d-flex">
                                                            <div class="icon m-0">
                                                                <img width="32" height="32"
                                                                    src="{{ asset($tech->icon) }}"
                                                                    alt="{{ $tech->slug }}"
                                                                    data-lazy-src="{{ asset($tech->icon) }}">
                                                            </div>
                                                            <div class="text">
                                                                <div class="title">
                                                                    <b>{{ $tech->name }}</b>
                                                                </div>
                                                                <span class="desc"> {!! \Str::limit($tech->description,
                                                                    60,
                                                                    $end='...') !!} </span>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                @endif
                @if(!empty($industries))
                <ul class="menu-item">
                    <li class="menu-text">
                        <a class="menu_text-a" href="{{route('industry.info')}}">Industries</a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="sub-menu sub_m_menu">
                                    <div class="sub-menu double three">
                                        @foreach($industries as $industry)
                                            <div class="box">
                                                <b><h6 class="text text-primary">{{ $industry->name }}</h6></b>
                                                @foreach($industry->industry as $indus)
                                                    <a
                                                        href="#">
                                                        <li class="icon-box d-flex">
                                                            <div class="icon m-0">
                                                                <img width="32" height="32"
                                                                    src="{{ asset($indus->icon) }}"
                                                                    alt="{{ $indus->slug }}"
                                                                    data-lazy-src="{{ asset($indus->icon) }}">
                                                            </div>
                                                            <div class="text">
                                                                <div class="title">
                                                                    <b>{{ $indus->name }}</b>
                                                                </div>
                                                                <span class="desc"> {!! \Str::limit($indus->description,
                                                                    60,
                                                                    $end='...') !!} </span>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                @endif
                @if(!empty($technologies))
                <ul class="menu-item">
                    <li class="menu-text">
                        <a class="menu_text-a" href="{{route('technology.info')}}">Technologies</a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="sub-menu sub_m_menu">
                                    <div class="sub-menu double three">
                                        @foreach($technologies as $technology)
                                            <div class="box">
                                                <h5>{{ $technology->name }}</h5>
                                                @foreach($technology->technology as $tech)
                                                    <a
                                                        href="#">
                                                        <li class="icon-box d-flex">
                                                            <div class="icon m-0">
                                                                <img width="32" height="32"
                                                                    src="{{ asset($tech->icon) }}"
                                                                    alt="{{ $tech->slug }}"
                                                                    data-lazy-src="{{ asset($tech->icon) }}">
                                                            </div>
                                                            <div class="text">
                                                                <div class="title">
                                                                    <b>{{ $tech->name }}</b>
                                                                </div>
                                                                <span class="desc"> {!! \Str::limit($tech->description,
                                                                    60,
                                                                    $end='...') !!} </span>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                @endif
                @if(!empty($services))
                <ul class="menu-item">
                    <li class="menu-text">
                        <a class="menu_text-a" href="{{route('service.info')}}">Services</a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="sub-menu sub_m_menu">
                                    <div class="sub-menu double three">
                                        @foreach($services as $service)
                                            <div class="box">
                                                <h5>{{ $service->name }}</h5>
                                                @foreach($service->service as $serv)
                                                    <a
                                                        href="#">
                                                        <li class="icon-box d-flex">
                                                            <div class="icon m-0">
                                                                <img width="32" height="32"
                                                                    src="{{ asset($serv->icon) }}"
                                                                    alt="{{ $serv->slug }}"
                                                                    data-lazy-src="{{ asset($serv->icon) }}">
                                                            </div>
                                                            <div class="text">
                                                                <div class="title">
                                                                    <b>{{ $serv->name }}</b>
                                                                </div>
                                                                <span class="desc"> {!! \Str::limit($serv->description,
                                                                    60,
                                                                    $end='...') !!} </span>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                @endif
            </div>


            <div class="set_btn">
                <a class="default-btn text-uppercase" href="https://www.prismetric.com/request-quote/"
                    id="pris_header">Get a quote<span></span></a>
            </div>
        </div>
    </div>
</nav>
