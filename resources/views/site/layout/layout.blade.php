<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('site.layout._analytics')
        @include('site.layout._meta')

        {{--Styles--}}
        {!! Html::style('/css/app.css') !!}
        {!! Html::style('/css/site/style.min.css') !!}
        @yield('css')
    </head>
    <body>
        @include('site.layout._errors')

        <div class='row'>
            <div class='container'>
                <main>
                    <section>
                        @yield('content')
                    </section>
                </main>
            </div>
        </div>

        <footer class='text-center'>
            &copy; 2018 {{env('APP_NAME')}}<br/>
            <a href='http://colmeiatecnologia.com.br' alt='Colmeia Tecnologia' title='Colmeia Tecnologia' target='_blank'>
                Colmeia Tecnologia
            </a>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
