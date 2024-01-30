@extends('FE.layout.main')

@section('title')
<title>GroupIn - Scholarship</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/fe/menu.css">
@endsection

@section('container')
<section class="menu">
    <div class="menu-header">
        <h1>Scholarship List</h1>
    </div>
    <div class="menu-body">
        @foreach($scholarships as $scholarship)
            <div class="menu-item">
                <div class="menu-item-header">
                    <img src="/img/card-default-img.jpg" alt="{{ $scholarship->title }}">
                </div>
                <div class="menu-item-body">
                    <h2>{{ $scholarship->title }}</h2>
                    <p>{{ $scholarship->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('thirdparty_js')
@endsection