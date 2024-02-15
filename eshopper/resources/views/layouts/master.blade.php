<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <link href="{{ asset('Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/main.css')}}" rel="stylesheet">
    @yield('css')
    <style>
        /* Kiểu dáng tùy chỉnh cho trường nhập */
        .custom-input {

            border: 2px solid #3498db;
            /* Màu viền */
            padding: 8px;
            /* Khoảng cách bên trong */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Đổ bóng nhẹ */
        }

        /* Tùy chỉnh màu nền khi trường nhập được chọn */
        .custom-input:focus {
            background-color: #f5f5f5;
        }

        .search-ajax-result {
            position: absolute; 
            padding-top: 10px;
            z-index: 1000;
        }


        /* Thiết lập các thuộc tính CSS khác cho .search-ajax-result nếu cần */
    </style>
</head>

<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')


    <script src="{{ asset('jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('Eshopper/js/jquery.js')}}"></script>
    <script src="{{ asset('Eshopper/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('Eshopper/js/price-range.js')}}"></script>
    <script src="{{ asset('Eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('Eshopper/js/main.js')}}"></script>
    <script src="{{ asset('searchjs/search_product.js')}}"></script>
    @yield('js')

</body>


</html>