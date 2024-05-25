@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{route('projects.create')}}">Create Project</a>
        <ul>
            @foreach($projects as $project)
                <li>
                    {{ $project->name }}
                    <a href="{{ route('projects.edit', $project) }}">Edit</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
