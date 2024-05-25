@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Project</h1>
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Project Name</label>
                <input type="text" name="name" value="{{ $project->name }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
