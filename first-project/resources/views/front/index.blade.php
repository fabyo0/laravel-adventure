{{--TODO: @yield() alanlarımızı dinamik hale getirdik--}}

{{-- Front extend edildi --}}
@extends('layouts.front')

@section('title')
    Anasayfa
@endsection

@section('css')
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Anasayfa</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, tempora!</p>
    </div>
@endsection

@section('js')
    <script !src="">
        console.log('Hakkimda')
    </script>
@endsection
