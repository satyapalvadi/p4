@extends('layouts.master')

@section('title')
    Edit Group
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

    <form method='POST' action='/group/{{ $group->id }}/edit'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='name'>* Name</label>
        <input type='text' name='name' id='title' value='{{ old('name', $group->name) }}'>
        @include('modules.field-error', ['field' => 'name'])

        <label for='size'>* Size</label>
        <input type='number' name='size' id='size' value='{{ old('size', $group->max_size) }}'>
        @include('modules.field-error', ['field' => 'size'])

        <input type='submit' value='Save' class='btn btn-primary'>
    </form>

@endsection