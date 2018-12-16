@extends('layouts.master')

@section('title')
    Create Group
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

    <form method='POST' action='/group/create'>
        {{ csrf_field() }}

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        @include('modules.field-error', ['field' => 'name'])

        <label for='size'>* Size</label>
        <input type='number' name='size' id='size' value='{{ old('size') }}'>
        @include('modules.field-error', ['field' => 'size'])

        <input type='submit' value='Create' class='btn btn-primary'>
    </form>
@endsection