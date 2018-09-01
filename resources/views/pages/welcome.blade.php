@extends('main')

@section('title', ' | Welcome')

@section('content')
    <div class="container landing">
        <div class="row">
            <div class="col-12">
                <div class="landing__header" style="background-image:url('/images/landing/header.png')">

                </div>
                <div style="border-top:2px solid #e4e4e4;"></div>
            </div>
        </div>
        <div class="row" style="position: relative;">
            <div class="col-md-6 pr-0" style="border-right:2px solid #e4e4e4;">
                <img src="/images/landing/img_1.png">
            </div>
            <div class="col-md-6 pl-0">
                <img src="/images/landing/img_2.png">
            </div>
            <div style="position: absolute; left:15px; right:15px; top:0; bottom:0; background: rgba(0,0,0,0.4); display:flex; justify-content:center; align-items:center;">
                <a href="/login" class="btn btn-primary" style="color:white; background-color: #FF8733; padding:1.5rem 4rem; font-size:1.5rem; border:1px solid #FF8733;">Play now!</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="dude">
                    <img src="/images/landing/dude_1.jpg">
                    <div class="dude__content">
                        <span class="dude__title">Thijs Bouwes</span>
                        <span class="dude__job">Back-end</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dude">
                    <img src="/images/landing/dude_2.png">
                    <div class="dude__content">
                        <span class="dude__title">Jeroen Groenveld</span>
                        <span class="dude__job">Front-end</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dude">
                    <img src="/images/landing/dude_3.jpg">
                    <div class="dude__content">
                        <span class="dude__title">Kjell Ruiter</span>
                        <span class="dude__job">Design</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop