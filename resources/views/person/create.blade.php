@extends('layouts.master')

@section('title')
    Create Individual
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

    <form method='POST' action='/person/create'>
        {{ csrf_field() }}
        <label for='name'>* First Name</label>
        <input type='text'
               name='first_name'
               id='first_name'
               @if(old('first_name')) value='{{ old('first_name') }}'
               @else @if(isset($first_name)) value='{{ $first_name }}' @endif @endif>
        @include('modules.field-error', ['field' => 'first_name'])

        <label for='name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name' value='{{ old('last_name') }}'>
        @include('modules.field-error', ['field' => 'last_name'])

        <div display='flex'>
            <label for='gender'>* Gender</label>
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
        </div>
        @include('modules.field-error', ['field' => 'gender'])

        <label for='age'>* Age (Years)</label>
        <input type='number' name='age' id='age' value='{{ old('age') }}'>
        @include('modules.field-error', ['field' => 'age'])

        <label for='weight'>* Weight (lbs)</label>
        <input type='number' name='weight' id='weight' value='{{ old('weight') }}'>
        @include('modules.field-error', ['field' => 'weight'])

        <label for='height'>* Height (inches)</label>
        <input type='number' name='height' id='height' value='{{ old('height') }}'>
        @include('modules.field-error', ['field' => 'height'])

        <label for='grps'>* Group(s)</label>
        <select id='grps' name='grps[]' multiple>
            @foreach($groups as $group)
                <option value='{{ $group->id}}'>{{ $group->name }}</option>
            @endforeach
        </select>

        <input type='submit' value='Create' class='btn btn-primary'>
    </form>

@endsection