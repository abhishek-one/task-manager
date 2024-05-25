@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Task Name</label>
            <input type="text" name="name" value="{{ $task->name }}" required>
        </div>
        <div>
            <label>Project</label>
            <select name="project_id">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
