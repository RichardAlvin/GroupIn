@extends('FE.layout.main')

@section('title')
<title>GroupIn - Group</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/fe/group.css">
@endsection

@section('container')
<section class="group">
    <section class="group-search">
        <div class="group-search-left">
            <button id="createButton">
                <div class="group-add-menu">
                    Create Group
                </div>
            </button>
            <a href="/group?Group=Own">
                <div class="group-search-menu" data-group="Own">
                    My Group
                </div>
            </a>
            <a href="/group?Group=Public">
                <div class="group-search-menu" data-group="Public">
                    Public Group
                </div>
            </a>
        </div>
        <div class="group-search-right">
            <input type="text" name="group" placeholder="search group">
        </div>
    </section>
    <section class="group-data">
        @foreach($groups as $group)
            <div class="card-item">
                <div class="card-item-header">
                    <div class="corner-right-item"><b>{{ $group->curr_slot}} / {{ $group->slot }}</b></div>
                    <div class="corner-right-bottom-item {{ $group->isOpen == false ? 'closed' : 'open' }}"><b>{{ $group->isOpen == false ? "Closed" : "Open" }}</b></div>
                    <img src="/img/card-default-img.jpg" alt="Group_Image" />
                </div>
                <div class="card-item-body">
                    <h1>{{ $group->name }}</h1>
                    <p>{{ $group->created_at }}</p>
                </div>
            </div>
        @endforeach
        <div class="pagination">
            {{ $groups->links() }}
        </div>
    </section>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Group</h2>
                <span class="close">&times;</span>
            </div>
            <form action="/group" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="groupName">Name:</label>
                    <input type="text" id="groupName" name="name" required>
        
                    <label for="groupDescription">Description:</label>
                    <input type="text" id="groupDescription" name="description" required>
        
                    <label for="groupSlot">Slot:</label>
                    <input type="number" id="groupSlot" name="slot" required min=1 max=10>

                    <label for="groupOpen">Open for Public?:</label>
                    <input type="checkbox" id="groupOpen" name="isOpen">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="addButton">Add</button>
                    <button class="btn btn-danger" id="cancelButton">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('thirdparty_js')
<script src="/js/fe/group.js"></script>
@endsection