@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">

        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')])> {{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">
                Long Description
            </label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')])> {{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-2">
            <button class="btn" type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>

@endsection
