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
            <h2>Group: {{ $group->name }}</h2>
        </div>
        <div class="group-detail-info-right">
            <a href="/group?Group=Own" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
            </a>
            @if($isOwner)
                <button id="createButton" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                </svg>
                </button>
                <form method="POST" action="/group/{{ $group->slug }}" onsubmit="return confirm('Are you sure you want to delete this group?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                    </button>
                </form>
            @endif
        </div>
    </section>

    <section class="group-detail-bottom">
        <section class="group-detail-member">
            <div class="group-detail-member-header">
                <h3>Member => {{ $group->curr_slot }} / {{ $group->slot }}</h3>
            </div>
            <div class="group-detail-member-wrapper">
                @foreach($members as $member)
                    <div class="group-detail-item">
                        <div class="group-detail-item-left">
                            <p>{{ $member->user->name }} - 
                                @if($member->IsOwner)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                @endif
        
                                @if($member->IsEdit)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                @endif
        
                                @if($member->IsView)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                @endif
                            </p>
                        </div>
                        <div class="group-detail-item-right">
                            <button onclick="openModalMember('{{ $member->id }}')" id="detailMember" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="modalMember{{ $member->id }}" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Edit Member Permission</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalMember('{{ $member->id }}')">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>User Permission Detail - OnProgress</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    
        <section class="group-detail-menu">
            <div class="group-detail-menu-top">
                <nav class="horizontal-navbar">
                    <ul>
                        <li><a href="#">To Do List</a></li>
                        <li><a href="#">Group Chat</a></li>
                        <li><a href="#">Pending Member</a></li>
                    </ul>
                </nav>
            </div>
            <div class="group-detail-menu-bottom">
                {{-- Pending Member Div --}}
                <div class="pending-member">
                    <div class="pending-member-header">
                        <h3>Pending Member</h3>
                    </div>
                    <div class="pending-member-body">
                        @foreach($pendingMembers as $pendingMember)
                            <div class="pending-member-item">
                                <div class="pending-member-item-left">
                                    {{ $pendingMember->user->name }}
                                </div>
                                <div class="pending-member-item-right">
                                    <form action="/detail-group/{{ $group->slug }}" method="POST">
                                        @csrf <!-- CSRF protection for Laravel -->
                                        <input type="hidden" name="user_id" value="{{ $pendingMember->user->id }}"/>
                                        <button type="submit" class="btn-icon btn-success" onclick="return confirmGroupJoin({{ $group->IsOpen }}, '{{ $pendingMember->user->name }}')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                        </svg>
                                        </button>
                                    </form>
                                    <form action="/pending-member/{{ $pendingMember->user->id }}" method="POST">
                                        @csrf <!-- CSRF protection for Laravel -->
                                        @method('delete')
                                        <input type="hidden" name="group_id" value="{{ $group->id }}"/>
                                        <button type="submit" class="btn-icon btn-danger"  onclick="return confirmRemovePendingMember({{ $group->IsOpen }}, '{{ $pendingMember->user->name }}')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                        </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </section>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit {{ $group->name }} Group</h2>
                <span class="close">&times;</span>
            </div>
            <form action="/group/{{ $group->slug }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="groupName">Name:</label>
                    <input type="text" id="groupName" name="name" required value="{{ old('name', $group->name) }}">
        
                    <label for="groupDescription">Description:</label>
                    <input type="text" id="groupDescription" name="description" required value="{{ old('description', $group->description) }}">
        
                    <label for="groupSlot">Slot:</label>
                    <input type="number" id="groupSlot" name="slot" required min=1 max=10 value="{{ old('slot', $group->slot) }}">

                    <label for="groupOpen">Open for Public?:</label>
                    <input type="checkbox" id="groupOpen" name="IsOpen" {{ $group->IsOpen ? 'checked' : '' }}>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="addButton">Edit</button>
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