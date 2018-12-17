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
               @else @if(session('first_name')) value='{{ session('first_name') }}' @endif @endif>
        @include('modules.field-error', ['field' => 'first_name'])

        <label for='name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name'
               @if(old('last_name')) value='{{ old('last_name') }}'
               @else @if(session('last_name')) value='{{ session('last_name') }}' @endif @endif>
        @include('modules.field-error', ['field' => 'last_name'])

        <div display='flex'>
            <label for='gender'>* Gender</label>
            <input type='radio' id='Male' name='gender' value='Male'
            @if(old('gender'))  @if(old('gender') === 'Male') {{ 'checked'  }} @endif
                    @else
                @if(session('gender')) @if(session('gender') === 'Male') {{ 'checked' }} @endif @else {{ 'checked' }} @endif
                    @endif>
            <span>Male</span>
            <input type='radio' id='Female' name='gender' value='Female'
            @if(old('gender'))  @if(old('gender') === 'Female') {{ 'checked'  }} @endif
                    @else
                @if(session('gender') && session('gender') === 'Female') {{ 'checked' }} @endif>
            @endif
            <span>Female</span>
        </div>
        @include('modules.field-error', ['field' => 'gender'])

        <label for='age'>* Age (Years)</label>
        <input type='number' name='age' id='age'
               @if(old('age')) value='{{ old('age') }}'
               @else @if(session('age')) value='{{ session('age') }}' @endif @endif>
        @include('modules.field-error', ['field' => 'age'])

        <label for='weight'>* Weight (lbs)</label>
        <input type='number' name='weight' id='weight'
               @if(old('weight')) value='{{ old('weight') }}'
               @else @if(session('weight')) value='{{ session('weight') }}' @endif @endif>
        @include('modules.field-error', ['field' => 'weight'])

        <label for='height'>* Height (inches)</label>
        <input type='number' name='height' id='height'
               @if(old('height')) value='{{ old('height') }}'
               @else @if(session('height')) value='{{ session('height') }}' @endif @endif>
        @include('modules.field-error', ['field' => 'height'])

        <label for='grps'>* Group(s)</label>
        <select id='grps' name='grps[]' multiple>
            @foreach($groups as $group)
                <option @if(old('grps')) {{ in_array($group->id, old('grps')) ? 'selected' : '' }}
                @else @if(session('grps')) {{ in_array($group->id, session('grps')) ? 'selected' : '' }} @endif  @endif value='{{ $group->id}}'>{{ $group->name }}</option>
            @endforeach
        </select>

        <input type='submit' value=@if(session('req_type') == 'create'){{ 'Create' }} @elseif(session('req_type') == 'edit'){{ 'Save' }} @else {{ 'Create' }} @endif class='btn btn-primary'>
    </form>

@endsection