@extends('FE.layout.main')

@section('title')
<title>GroupIn - Training</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/fe/menu.css">
@endsection

@section('container')
<section class="menu">
    <div class="menu-header">
        <h1>Training List</h1>
    </div>
    <div class="menu-body">
        @foreach($trainings as $training)
            <div class="menu-item">
                <div class="menu-item-header">
                    <img src="/img/card-default-img.jpg" alt="{{ $training->title }}">
                </div>
                <div class="menu-item-body">
                    <h2>{{ $training->title }}</h2>
                    <p>{{ $training->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('thirdparty_js')
@endsection