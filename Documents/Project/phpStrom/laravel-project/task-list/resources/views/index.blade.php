@extends('layout.app')
@section('title', 'The List of Tasks')


@section('content')

    <nav class="mb-10 mt-5 ">
        <a href="{{ route('tasks.create') }}"
        class="link">
            Add Task!
        </a>
    </nav>

    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['text-black-500', 'line-through' => $task->completed])>
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
        @endif
@endsection
