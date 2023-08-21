@extends('layouts.app')

@section('title', 'List of Tasks')
@section('content')
    <div>
        {{-- <h2>The list of tasks</h2> --}}
        {{-- @if (count($tasks))
        @foreach ($tasks as $task)
            <div>{{ $task->title }}</div>
        @endforeach
    @else
        <div>there are no tasks</div>
    @endif --}}

        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                    {{ $task->title }}
            </div>
            </a>

        @empty
            <div>There is no task</div>
        @endforelse

    </div>

@endsection
