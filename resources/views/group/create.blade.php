@extends('layouts.master')

@section('title')
    Create a Group
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

    <h1>Add a new Group</h1>

    <form method='POST' action='/group/create'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        @include('modules.field-error', ['field' => 'name'])

        <label for='size'>* Size</label>
        <input type='number' name='size' id='size' value='{{ old('size') }}'>
        @include('modules.field-error', ['field' => 'size'])

        <input type='submit' value='Add' class='btn btn-primary'>
    </form>

@endsection