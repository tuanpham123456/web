<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <title >{{ $title_page ?? "Shop Đồng Hồ TP" }}</title>
    @yield('css')

    {{-- tích hợp thông báo  --}}
    @if(session('toastr'))
    <script>
        var TYPE_MESSAGE = "{{session('toastr.type')}}";
        var MESSAGE = "{{session('toastr.message')}}";
    </script>
    {{--  --}}
    @endif

</head>
<body>
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')
    <script>
        var DEVICE = '{{ device_agent()}}'
    </script>
    @yield('script')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script type="text/javascript">
        if (typeof TYPE_MESSAGE != "undefined") {
            switch (TYPE_MESSAGE){
                case 'success' :
                    toastr.success(MESSAGE)
                    break;
                case 'error':
                    toastr.error(MESSAGE)
                    break;
            }
        }
    </script>
</body>
</html>
