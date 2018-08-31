<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
    </head>

    <body>
        <!--nav-->
        @include('partials._nav')

        <!--content-->
        <div id="app" class="py-4">
            @yield('content')
        </div>

        @include('partials._footer')
    </body>
</html>