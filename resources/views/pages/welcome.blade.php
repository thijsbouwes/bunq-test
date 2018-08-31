@extends('main')

@section('title', ' | Welcome')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Bunq Test
            </div>

            <div class="links">
                {{--<a href="{{ $bunq_url }}">--}}
                    {{--@include('partials.bunq-auth-logo')--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
@stop