<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('site.layout.meta')

        <!-- Styles -->
        {!! Html::style('/css/app.css') !!}
        {!! Html::style('/css/site/style.min.css') !!}

        {{--JS--}}

        {!! Html::script('/js/jquery.min.js') !!}
    </head>
    <body>
        @include('site.layout.analytics')

        @yield('content'
)
        <footer>
            &copy; 2017 - <a href='http://www.colmeiatecnologia.com.br' title='Colmeia Tecnologia'>Colmeia Tecnologia</a>
        </footer>
    </body>
        
    @yield('post-script')
</html>
