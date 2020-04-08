<!DOCTYPE html>
<html lang="vi">
<head>
    @yield('css')

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        
</head>
<body>
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')
    @yield('script')

</body>
</html>