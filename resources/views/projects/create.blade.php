@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div>
                <label>Project Name</label>
                <input type="text" name="name" required>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
