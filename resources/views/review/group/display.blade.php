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

    <h1>Review Group Activity</h1>

    <form method='GET' action='/review/group/list'>
        <label for='group_id'>* Select Group</label>
        <select id='group_id' name='group_id'>
            @foreach ($groups as $group)
                <option value='{{ $group->id }}'>{{ $group->name }}</option>
            @endforeach
        </select>
        <input type='submit' value='GO' class='btn btn-primary'>
    </form>

@endsection