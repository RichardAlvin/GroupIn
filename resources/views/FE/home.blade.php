@extends('FE.layout.main')

@section('title')
<title>GroupIn - Home</title>
@endsection

@section('thirdparty_css')

@endsection

@section('container')
<section class="main">
    @if(session()->has('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <section class="main-hero">
        <div class="main-hero-left">
            <div class="wrapper">
                <h1>Build Your Group, Easier, Together</h1>
                <p>GroupIn make it easy to create groups, collaborate, and more interesting informations</p>
                <div class="wrapper-btn">
                    <a href="/group?Group=Own"><button class="btn btn-primary">Build Your Group</button></a>
                    <button class="btn-outline btn-outline-secondary" id="scroll-button">Get Information</button>
                </div>
            </div>
        </div>
        <div class="main-hero-right">
        </div>
    </section>
    <section class="main-info">
        <div class="wrapper">
            <div class="item">
                <div class="item-header">
                    <img src="/img/community.svg">
                </div>
                <div class="item-body">
                    <h1>Connecting</h1>
                    <p>Connecting with million people</p>
                </div>
            </div>
            <div class="item">
                <div class="item-header">
                    <img src="/img/selecting_team.svg">
                </div>
                <div class="item-body">
                    <h1>Selecting</h1>
                    <p>Selecting member that join your group</p>
                </div>
            </div>
            <div class="item">
                <div class="item-header">
                    <img src="/img/having_fun.svg">
                </div>
                <div class="item-body">
                    <h1>Collaborate</h1>
                    <p>Collaborate together to join event, challenge, ext</p>
                </div>
            </div>
        </div>
    </section>
    <section id="main-search" class="main-search">
        <div class="search-container">
            <div class="search-column">Training</div>
            <div class="search-column">Competition</div>
            <div class="search-column">Scholarship</div>
        </div>
        <div class="item-container">
            @foreach($competitions as $competition)
            <div class="item-card">
                <div class="item-card-header">
                    <img src="/img/card-default-img.jpg" alt="{{ $competition->title }}">
                </div>
                <div class="item-card-body">
                    <h1>{{ $competition->title }}</h1>
                    <p>{{ $competition->created_at }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="see-more-item">
            <button class="btn btn-primary">See More</button>
        </div>
    </section>
    <section class="main-group">
        <div class="main-group-left">
            <img src="/img/team_page.svg">
        </div>
        <div class="main-group-right">
            <h1>Build Your Group with GroupIn</h1>
            <p>Build your group and your group will appear public. People can
                see your group and join your group. You can also put some selecting process.
                So you can select people who want to join your group.
            <div>
                <a href="/group?Group=Own" class="btn btn-primary">Build Your Group</a>
            </div>
        </div>
    </section>
</section>
@endsection

@section('thirdparty_js')
<script src="/js/fe/home.js"></script>
@endsection