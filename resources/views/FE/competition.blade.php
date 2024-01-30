@extends('FE.layout.main')

@section('title')
<title>GroupIn - Competition</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/fe/menu.css">
@endsection

@section('container')
<section class="menu">
    <div class="menu-header">
        <h1>Competition List</h1>
    </div>
    <div class="menu-body">
        @foreach($competitions as $competition)
            <div class="menu-item">
                <div class="menu-item-header">
                    <img src="/img/card-default-img.jpg" alt="{{ $competition->title }}">
                </div>
                <div class="menu-item-body">
                    <h2>{{ $competition->title }}</h2>
                    <p>{{ $competition->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('thirdparty_js')
@endsection