@extends('layouts.master')

@section('title')
    Edit Individual
@endsection

@push('head')
    <link href='/css/journal.css' rel='stylesheet'>
    <link href='/css/people.css' rel='stylesheet'>
@endpush

@section('content')
    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Edit Individual</h1>

    <form method='POST' action='/person/{{ $person->id }}/edit'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='name'>* First Name</label>
        <input type='text' name='first_name' id='first_name' value='{{ old('first_name', $person->first_name) }}'>
        @include('modules.field-error', ['field' => 'first_name'])

        <label for='name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name' value='{{ old('last_name', $person->last_name) }}'>
        @include('modules.field-error', ['field' => 'last_name'])

        <label for='size'>* Gender</label>
        <div>
            <input type='radio' id='Male' name='gender' value='Male'
            @if(old('gender', $person->gender))  @if(old('gender', $person->gender) === 'Male') {{ 'checked'  }} @endif
            @else
            @if(isset($gender)) @if($gender === 'Male') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
            @endif>
            <span>Male</span>
            <input type='radio' id='Female' name='gender' value='Female'
            @if(old('gender', $person->gender))  @if(old('gender', $person->gender) === 'Female') {{ 'checked'  }} @endif
                    @else
                @if(isset($gender) && $gender === 'Female') {{ 'checked' }} @endif>
            @endif
            <span>Female</span>
        </div>
        @include('modules.field-error', ['field' => 'gender'])

        <label for='age'>* Age (Years)</label>
        <input type='number' name='age' id='age' value='{{ old('age', $person->age) }}'>
        @include('modules.field-error', ['field' => 'age'])

        <label for='weight'>* Weight (lbs)</label>
        <input type='number' name='weight' id='weight' value='{{ old('weight', $person->weight) }}'>
        @include('modules.field-error', ['field' => 'weight'])

        <label for='age'>* Height (inches)</label>
        <input type='number' name='height' id='height' value='{{ old('height', $person->height) }}'>
        @include('modules.field-error', ['field' => 'height'])

        <label for='grps'>* Groups</label>
        <select id='grps' name='grps[]' multiple>
            @foreach($groups as $group)
                <option @if(in_array($group->id, $selectedGroups)) {{ 'selected' }} @endif value='{{ $group->id }}'>{{ $group->name }}</option>
            @endforeach
        </select>
        <input type='submit' value='Save changes' class='btn btn-primary'>
    </form>

@endsection