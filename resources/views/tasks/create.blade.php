@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label>Task Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Project</label>
            <select name="project_id">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
