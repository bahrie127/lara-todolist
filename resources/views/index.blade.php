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
        <nav class="mb-4">
            <a class="font-medium text-gray-700 underline decoration-blue-500" href="{{ route('tasks.create') }}">Add Task</a>
        </nav>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
                    {{ $task->title }}
            </div>
            </a>

        @empty
            <div>There is no task</div>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif

    </div>

@endsection
