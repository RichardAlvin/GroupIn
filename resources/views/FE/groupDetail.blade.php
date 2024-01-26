@extends('FE.layout.main')

@section('title')
<title>GroupIn - Group Detail</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/fe/group.css">
@endsection

@section('container')
<section class="group">
    <section class="group-detail-info">
        
    </section>

    <section class="group-detail-member">

    </section>

    <section class="group-detail-menu">
        
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
                    <input type="checkbox" id="groupOpen" name="IsOpen">
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