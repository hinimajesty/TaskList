<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trello Board Clone</title>

        @vite(['resources/css/style.scss', 'resources/js/app.js'])
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="app" class="container">
            <div class="board">

                <task-list title="To Do"></task-list>
                <task-list title="Doing"></task-list>
                <task-list title="Done"></task-list>

                <add-task-list></add-task-list>
                
            </div>

        </div>
    </body>
</html>
