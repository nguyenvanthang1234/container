<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div class="wrapper">
        <h1>header</h1>

        </div>
        <div class="wp-content">

            <div class="content">
                @yield("content")
            </div>

            <div class="sidebar">

                @section("sidebar")
                <p>khoi tim kiem </p>
                @show

            </div>

        </div>
        <div class="footer">
            <h1>footer</h1>

        </div>

    </div>
</body>
</html>