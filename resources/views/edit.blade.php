working create view
@
@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@section('content')

    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">

        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description">{{ $task->description }} </textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea name="long_description" id="long_description">{{ $task->long_description }} </textarea>
            @error('long_description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>

@endsection
