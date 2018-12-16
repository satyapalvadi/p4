@extends('layouts.master')

@section('title')
    All Persons
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
    <link href='/css/people.css' rel='stylesheet'>
@endpush

@section('content')
    <section id='peopleTable'>
        <table style='width: 100%'>
            <tr>
                <th>Delete</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age (years)</th>
                <th>Height (inches)</th>
                <th>Weight (lbs)</th>
                <th>Groups</th>
                <th>Edit</th>

            </tr>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->gender }}</td>
                    <td>{{ $person->age }}</td>
                    <td>{{ $person->weight }}</td>
                    <td>{{ $person->height }}</td>
                    <td>
                        @foreach($person->selectedGroups as $selectedGroup)
                            <div>{{ $selectedGroup }}</div>
                        @endforeach
                    </td>
                    <td class='editColumn'><a href='/person/{{ $person->id }}/edit/display'><i class="fas fa-pencil-alt"></i></a></td>
                    <td class='editColumn'><a href='/person/{{ $person->id }}/delete/display'><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection