@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a class="font-medium text-gray-700 underline decoration-blue-500" href="{{ route('tasks.index') }}">HOME</a>
    </div>


    <p class="mb04 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }}. Update
        {{ $task->updated_at->diffForHumans() }}</p>


    <p>
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <div>
        <a class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50"
            href='{{ route('tasks.edit', ['task' => $task]) }}'>Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
@endsection
