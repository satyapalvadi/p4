@extends('layouts.master')

@section('title')
    Person Log
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
    <link href='/css/review.css' rel='stylesheet'>
@endpush

@section('content')
    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Add new activity</h1>

    <form method='GET' action='/review/person/list'>
        <label for='person_id'>* Select Person</label>
        <select id='person_id' name='person_id'>
            @foreach ($persons as $person)
                <option value= {{ $person->id }} @if($person->id === $selectedPerson->id) {{ 'selected' }} @endif
                >{{ $person->first_name }} {{ $person->last_name }}</option>
            @endforeach
        </select>
        <input type='submit' value='GO' class='btn btn-primary'>
    </form>

    <h2>Activity Results</h2>
    <table>
        <tr>
            <th>Activity Date</th>
            <th>Weight</th>
            <th>Activity Level</th>
            <th>BMR</th>
            <th>Calories Burned</th>
        </tr>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->activity_date }}</td>
            <td>{{ $log->weight }}</td>
            <td>{{ $log->activity }}</td>
            <td>{{ $log->bmr }}</td>
            <td>{{ $log->calories_burned }}</td>
        </tr>
        @endforeach
    </table>
@endsection