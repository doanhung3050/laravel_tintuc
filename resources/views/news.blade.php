<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="layout">
        <div id="top">
            Admin Area :: Trang chính
        </div>
        <div id="menu">
            <table width="100%">
                <tr>
                    <td>
                        <a href="">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a>
                    </td>
                    <td align="right">
                        Xin chào | <a href="">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div id="main">
            @yield('content')
        </div>
        <div id="bottom">
            Copyright © 2016 by QuocTuan.Info & QHOnline.Edu.Vn 
        </div>
    </div>
</body>
</html>