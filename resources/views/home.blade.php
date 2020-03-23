<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Noi dung bai viet</h1>

    <div>
    @section('banner')
    day la banner
    @show
    </div>

    <p>@yield('noidung')</p>

    <h2>@yield('ten')</h2>
</body>
</html>