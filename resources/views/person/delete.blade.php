@extends('layouts.master')

@section('title')
    Delete Individual
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

    <h1>Confirm Delete</h1>

    <form method='POST' action='/person/{{ $person->id }}/delete'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <div>Do you want to delete the following person: {{ $person->first_name }} {{$person->last_name}}?</div>
        <input type='submit' value='Yes' class='btn btn-primary'>
    </form>

@endsection