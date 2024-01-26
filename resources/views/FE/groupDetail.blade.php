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
        <div class="group-detail-info-left">
            <h4>{{ $group->name }}</h4>
        </div>
        <div class="group-detail-info-right">
            <button class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
              </svg>
            </button>
            <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
              </svg>
            </button>
        </div>
    </section>

    <section class="group-detail-member">
        <div class="group-detail-member-wrapper">
            @foreach($members as $member)
                <div class="group-detail-item">
                    <p>{{ $member->user->name }} - 
                        @if($member->IsOwner)
                            admin
                        @endif

                        @if($member->IsEdit)
                            edit
                        @endif

                        @if($member->IsView)
                            view
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
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