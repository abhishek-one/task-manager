@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tasks</h1>
    <a href="{{route('tasks.create')}}">Create Task</a>
    <br>
    <br>
    <select id="project-filter">
        <option value="all">All Projects</option>
        @foreach($projects as $project)
        <option value="{{ $project->id }}" {{ request('project') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
        @endforeach
    </select>
    <ul id="task-list">
        @foreach($tasks as $task)
        <li data-id="{{ $task->id }}" class="cursor-move">
            {{ $task->name }} ({{ $task->priority }})
            <a href="{{ route('tasks.edit', $task) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
<script>
$(document).ready(function () {
    const list = $('#task-list');
    const filter = $('#project-filter');

    filter.change(function () {
        const projectId = $(this).val();
        const url = projectId === 'all' ? '{{ route("tasks.index") }}' : '{{ route("tasks.index") }}?project=' + projectId;
        window.location.href = url;
    });

    new Sortable(list[0], {
        onEnd: function (evt) {
            const tasks = list.children().map(function() {
                return $(this).data('id');
            }).get();
            
            fetch('{{ route('tasks.reorder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ tasks })
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      location.reload();
                  }
              });
        }
    });
});
</script>
@endsection