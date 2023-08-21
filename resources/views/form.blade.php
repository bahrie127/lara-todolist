working create view
@
@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">

        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description"> {{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea name="long_description" id="long_description"> {{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>

@endsection
