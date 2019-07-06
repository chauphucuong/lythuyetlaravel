<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khoa Phạm - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('template/css/mystyle.css') }}">
</head>
<body>
    <div id="wrapper">
        @include('views.marquee',['mar_content'=>'Khóa học lập trình Laravel PHP'])
        <div id="header">
            @section('sidebar')
                Đây là menu
                
            @show
        </div>
        <div id="content">
            @yield('content')
        </div>
        <div id="footer"></div>
    </div>
</body>
</html>