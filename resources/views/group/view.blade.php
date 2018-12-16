@extends('layouts.master')

@section('title')
    All Groups
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
    <link href='/css/groups.css' rel='stylesheet'>
@endpush

@section('content')
    <section id='groupsTable'>
        <table style='width: 100%'>
            <tr>
                <th>Group Name</th>
                <th>Max Size</th>
                <th>Current Size</th>
                <th>Edit</th>
            </tr>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group['name'] }}</td>
                    <td class='numberColumn'>{{ $group['max_size'] }}</td>
                    <td class='numberColumn'>{{ $group['current_count'] }}</td>
                    <td class='editColumn'>
                        <a href='/group/{{ $group['id'] }}/edit/display'><i class="fas fa-pencil-alt"></i></a></td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection