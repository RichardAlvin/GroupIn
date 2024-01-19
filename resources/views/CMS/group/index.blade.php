@extends('CMS.layout.main')

@section('title')
<title>Groupin - Group Dashboard</title>
@endsection

@section('thirdparty_css')
<link rel="stylesheet" href="/css/table.css">
@endsection

@section('container')
<section class="main">
    <h1>Group Management</h1>
    <div class="table_component">
        <div class="table_header">
            @if(session()->has('success'))
                <div class="message_div success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('failed'))
                <div class="message_div failed">
                    {{ session('failed') }}
                </div>
            @endif
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>UpdateTime</th>
                        <th>Action</th>
                    </tr>
                <thead>
                <tbody>
                    @php
                        $no = ($groups->currentpage()-1) * $groups->perpage() + 1
                    @endphp
                    @foreach($groups as $group)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->description }}</td>
                        <td>{{ $group->updated_at }}</td>
                        <td>
                            <form action="/group/{{ $group->slug }}" method="post" style="display: inline;">
                                @method('delete')
                                @csrf
                                <button class="btn btn-icon btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $group->name }}?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15zm2-2h10V6H7zm2-2h2V8H9zm4 0h2V8h-2zM7 6v13z"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('thirdparty_js')

@endsection