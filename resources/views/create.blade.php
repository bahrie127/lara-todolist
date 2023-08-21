working create view
@
@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    {{ $errors }}
    <form method="POST" action="{{ route('tasks.store') }}">

        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description"> </textarea>
        </div>

        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea name="long_description" id="long_description"> </textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>

@endsection
