@extends("layouts.app")

@section("title", "Task List")

@section("content")
  {{-- @php
    echo "<pre>".print_r($tasks, true)."</pre>";
  @endphp --}}

  @forelse ($tasks as $task)
    <div>
      <a href="{{ route("tasks.index", ["id" => $task->id]) }}">
        {{ $task->title }}
      </a>
    </div>
  @empty
    <div>There are not tasks!</div>
  @endforelse
@endsection