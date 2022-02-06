<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{$title}} | CMS Admin</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                font-size: 13px;
            }

            .nav-link {
                color: white;
                background-color: rgba(0,0,0,.1)
            }

            .nav-link:hover,
            .nav-link.active {
                color: white;
                background-color: rgba(0,0,0,.4)
            }

            .nav .nav-item + .nav-item {
                margin-top: 1px;
            }
        </style>

        @stack("styles")
    </head>
    <body role="document" style="padding-top: 60px;">
        <div style="height: 60px; position: fixed; left: 0; top:0; width: 100%; background-color: #444; z-index: 200; display: flex; align-items: center; justify-content: space-between; padding-right: 20px; padding-left: 20px;">
            <div style="font-size: 24px; color: white;">
                CMS
            </div>
            <form method="post" action="{{route("hanakivan.cms.auth.logout")}}">
                <button type="submit" class="btn btn-outline-light btn-sm">Odhlásiť</button>
                @csrf
            </form>
        </div>
        <div style="display: flex; min-height: 100vh; padding-left: 250px">
            <div style="flex-shrink: 0; width: 250px; background-color: #444;position: fixed; top: 60px; bottom: 0; left:0;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(($active ?? "") === "home") active @endif" href="{{route("hanakivan.cms.auth.home")}}">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(($active ?? "") === "articles") active @endif" href="{{route("hanakivan.cms.auth.articles.list")}}">Články</a>
                    </li>
                </ul>
            </div>
            <div style="flex: 1; padding: 40px">
                @yield("content")
            </div>
        </div>

        @stack("scripts")
    </body>
</html>
