<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="wrapper">
        <div id="header"></div>
        <div id="content">
            <div id="left"></div>
            <div id="center">@yield('content')</div>
            <div id="right"></div>
        </div>
        <div id="footer"></div>
    </div>
</body>
</html>