<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">WeatherForcaster</a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        window.onload = function() {
            var audios = document.querySelectorAll('audio');
            var totalAudios = audios.length

            function playAudio(i, totalAudios) {
                if (i < totalAudios) {
                    var audio = audios[i];
                    audio.play();
                    i += 1;

                    audio.addEventListener('ended', function() {
                        playAudio(i, totalAudios);
                    })
                }
            }

            if(totalAudios > 0) {
                playAudio(0, totalAudios);
            }
        };

        // for (var i = 0; i < audioarray.length; i++) {
        //     var audio = audioarray[i];
        //     console.log(audio)
        //     audio.play();
        // }
    </script>
</body>
</html>
