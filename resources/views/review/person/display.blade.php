@extends('layouts.master')

@section('title')
    Person Log
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
                <option value='{{$person->id}}'>{{ $person->first_name }} {{ $person->last_name }}</option>
            @endforeach
        </select>
        <input type='submit' value='GO' class='btn btn-primary'>
    </form>

@endsection