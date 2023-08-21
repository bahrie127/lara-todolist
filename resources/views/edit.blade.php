working create view
@
@extends('layouts.app')

@section('content')
    @include('form', ['task' => $task])
@endsection
