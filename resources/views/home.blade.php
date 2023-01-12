<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trello Board Clone</title>

        <link href="{{asset('css/reset.css')}}" rel="stylesheet">
        <link href="{{asset('css/modal.css')}}" rel="stylesheet">
        <link href="{{mix('css/style.css')}}" rel="stylesheet">

    </head>
    <body>
        <div id="app"></div>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
