<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    @yield('css')

    <title>@yield('title')</title>
</head>
<body>

{{-- Navbar --}}
@include('front.menu')
{{--Navbar--}}

<div class="content min-vh-100">
    <div class="container">
        <div class="row">
            {{-- Content --}}
            <div class="col-8">
                {{-- TODO: Her sayfa özel olduğu için @yield() kullandık  --}}
                @yield('content')
            </div>
            <div class="col-4">
                @include('front.category')
            </div>
            {{-- Category  --}}
        </div>
    </div>
</div>

{{-- Footer --}}
@include('front.footer')
{{-- Footer --}}

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@yield('js')

</body>
</html>
