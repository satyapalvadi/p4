@extends('layouts.master')

@section('title')
    Enter Activity
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
    <link href='/css/logs.css' rel='stylesheet'>
@endpush

@section('content')
    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <form method='POST' action='/log/create'>
        {{ csrf_field() }}

        <label for='person_id'>* Select Person</label>
        <select id='person_id' name='person_id'>
            @foreach ($persons as $person)
                <option value='{{$person->id}}'>{{ $person->first_name }} {{ $person->last_name }}</option>
            @endforeach
        </select>

        <label for='name'>* Activity Date</label>
        <input type='date' name='activity_date' id='activity_date' value='{{ old('activity_date') }}'>
        @include('modules.field-error', ['field' => 'activity_date'])

        <label for='weight'>* Today's Weight (lbs)</label>
        <input type='number' name='weight' id='weight' value='{{ old('weight') }}'>
        @include('modules.field-error', ['field' => 'weight'])


        <label for='activity'>* Activity Level</label>
        <select id='activity' name='activity'>
            <option value='low'
                    @if(old('activity')) @if(old('activity') === 'low')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'low') {{  'selected' }} @endif
                    @endif>Low - You get little to no exercise
            </option>
            <option value='light'
                    @if(old('activity')) @if(old('activity') === 'light')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'light') {{  'selected' }} @endif
                    @endif>Light - You exercise lightly (1-3 days per week)
            </option>
            <option value='moderate'
                    @if(old('activity')) @if(old('activity') === 'moderate')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'moderate') {{  'selected' }} @endif
                    @endif>Moderate - You exercise moderately (3-5 days per week)
            </option>
            <option value='high'
                    @if(old('activity')) @if(old('activity') === 'high')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'high') {{  'selected' }} @endif
                    @endif>High - You exercise heavily (6-7 days per week)
            </option>
            <option value='very_high'
                    @if(old('activity')) @if(old('activity') === 'very_high')) {{ 'selected' }} @endif
            @else
                @if(isset($activity) && $activity === 'very_high') {{  'selected' }} @endif
                    @endif>Very High - You exercise very heavily (i.e. 2x per day, extra heavy workouts)
            </option>
        </select>
        @include('modules.field-error', ['field' => 'activity_level'])


        <input type='submit' value='Add' class='btn btn-primary'>
    </form>

@endsection