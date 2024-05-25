<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $projectId = $request->query('project');
        $tasks = $projectId ? Task::where('project_id', $projectId)->orderBy('priority')->get() : Task::orderBy('priority')->get();

        return view('tasks.index', compact('tasks', 'projects'));
    }


    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);
        
        $task = new Task();
        $task->name = $request->name;
        $task->priority = Task::max('priority') + 1;
        $task->project_id = $request->project_id;
        // dd($task);
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {
        $tasks = $request->tasks;
        foreach ($tasks as $index => $taskId) {
            $task = Task::find($taskId);
            if ($task) {
                $task->priority = $index + 1;
                $task->save();
            }
        }

        return response()->json(['success' => true]);
    }
}
