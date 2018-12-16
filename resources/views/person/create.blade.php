@extends('layouts.master')

@section('title')
    Create a Member
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

    <h1>Add a new Person</h1>

    <form method='POST' action='/person/create'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}
        <label for='name'>* First Name</label>
        <input type='text' name='first_name' id='first_name'
        @if(old('first_name')) value='{{ old('first_name') }}' @else @if(isset($first_name)) value='{{ $first_name }}' @endif @endif>
        @include('modules.field-error', ['field' => 'first_name'])

        <label for='name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name' value='{{ old('last_name') }}'>
        @include('modules.field-error', ['field' => 'last_name'])

        <label for='size'>* Gender</label>
        <input type='radio' id='Male' name='gender' value='Male'
            @if(old('gender'))  @if(old('gender') === 'Male') {{ 'checked'  }} @endif
            @else
            @if(isset($gender)) @if($gender === 'Male') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
            @endif>
        <span>Male</span>
        <input type='radio' id='Female' name='gender' value='Female'
            @if(old('gender'))  @if(old('gender') === 'Female') {{ 'checked'  }} @endif
            @else
            @if(isset($gender) && $gender === 'Female') {{ 'checked' }} @endif>
            @endif
        <span>Female</span>
        @include('modules.field-error', ['field' => 'gender'])

        <label for='age'>* Age</label>
        <input type='number' name='age' id='age' value='{{ old('age') }}'>
        <span> Years </span>
        @include('modules.field-error', ['field' => 'age'])

        <label for='weight'>* Weight</label>
        <input type='number' name='weight' id='weight' value='{{ old('weight') }}'>
        <span> lbs </span>
        @include('modules.field-error', ['field' => 'weight'])

        <label for='height'>* Height</label>
        <input type='number' name='height' id='height' value='{{ old('height') }}'>
        <span> in </span>
        @include('modules.field-error', ['field' => 'height'])

        <label for='grps'>* Groups</label>
        <select id='grps' name='grps[]' multiple>
            @foreach($groups as $group)
                <option value='{{ $group->id}}'>{{ $group->name }}</option>
            @endforeach
        </select>

        <input type='submit' value='Add' class='btn btn-primary'>
    </form>

@endsection