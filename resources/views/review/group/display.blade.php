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

    <form method='GET' action='/review/group/list'>
        <label for='group_id'>* Select Group</label>
        <select id='group_id' name='group_id'>
            @foreach ($groups as $group)
                <option value='{{ $group->id }}'>{{ $group->name }}</option>
            @endforeach
        </select>
        <label for='days_option_id'>* Select Days</label>
        <select id='days_option_id' name='Days'>
            <option value='5'>5 Days</option>
            <option value='10'>10 Days</option>
            <option value='15'>15 Days</option>
        </select>
        <label for='review_category'>* Select Category</label>
        <select id='review_category' name='Review Category'>
            <option value='weight'>Weight (lbs)</option>
            <option value='bmr'>BMR (Calories)</option>
            <option value='calories_burned'>Calories Burned</option>
        </select>
        <input type='submit' value='GO' class='btn btn-primary'>
    </form>

@endsection