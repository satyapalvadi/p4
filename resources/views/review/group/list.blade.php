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
                <option value= {{ $group->id }} @if($group->id === $selectedGroup->id) {{ 'selected' }} @endif
                >{{ $group->name }}</option>
            @endforeach
        </select>
        <label for='days_option_id'>* Select Days</label>
        <select id='days_option_id' name='Days'>
            <option value='5' @if($selectedDays == '5'){{ 'selected' }} @endif>5 Days</option>
            <option value='10' @if($selectedDays == '10'){{ 'selected' }} @endif>10 Days</option>
            <option value='15' @if($selectedDays == '15'){{ 'selected' }} @endif>15 Days</option>
        </select>
        <label for='review_category'>* Select Category</label>
        <select id='review_category' name='Review Category'>
            <option value='weight' @if($selectedReviewCategory == 'weight'){{ 'selected' }} @endif>Weight (lbs)</option>
            <option value='bmr' @if($selectedReviewCategory == 'bmr'){{ 'selected' }} @endif>BMR (Calories)</option>
            <option value='calories_burned' @if($selectedReviewCategory == 'calories_burned'){{ 'selected' }} @endif>Calories Burned</option>
        </select>
        <input type='submit' value='GO' class='btn btn-primary'>
    </form>
    <h2>Activity Results</h2>
    <table>
        <tr>
            <th>Activity Date</th>
            @foreach ($personsInGroup as $personHeader)
                <th>{{ $personHeader['first_name'] }} {{ $personHeader['last_name'] }}</th>
            @endforeach
        </tr>
        @foreach ($data as $row)
            <tr>
                @foreach($row as $key => $val)
                <td>
                    @if ($val == 'no data')
                        -
                    @else
                        {{ $val }}
                    @endif
                </td>
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection