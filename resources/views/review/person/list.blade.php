@extends('layouts.master')

@section('title')
    Review Activity (Individual)
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
@endpush

@section('content')
    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

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

    <table>
        <tr>
            <th>Activity Date</th>
            <th>Weight (lbs)</th>
            <th>Activity Level</th>
            <th>BMR (Calories)</th>
            <th>Calories Burned</th>
        </tr>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->activity_date }}</td>
                <td class='numberColumn'>{{ $log->weight }}</td>
                <td>{!!  ucwords(str_replace('_', ' ', $log->activity)) !!}</td>
                <td class='numberColumn'>{{ $log->bmr }}</td>
                <td class='numberColumn'>{{ $log->calories_burned }}</td>
            </tr>
        @endforeach
    </table>
@endsection