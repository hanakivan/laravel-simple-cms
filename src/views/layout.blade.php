<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{$title}}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @stack("styles")
    </head>
    <body role="document">
        <div class="container">
            @yield("content")
        </div>

        @stack("scripts")
    </body>
</html>
