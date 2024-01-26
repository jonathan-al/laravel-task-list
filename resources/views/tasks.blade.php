<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Template</title>
</head>
<body>
    <h1>List of tasks</h1>
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
</body>
</html>