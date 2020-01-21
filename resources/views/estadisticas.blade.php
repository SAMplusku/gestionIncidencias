@extends('master')

@section('content')
    <h1>Users Graphs</h1>

    <div>
        {!! $usersChart->container() !!}
    </div>

    {!! $usersChart->script() !!}
@endsection
