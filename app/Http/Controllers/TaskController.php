<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function tasks()
    {
        $tasks = Auth::user()->tasks;
        // var_dump($tasks);

        return response()->json($tasks);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        DB::transaction(function () use ($request) {
            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'completed' => $request->get('completed',false),
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Tarea creada con exito',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'taskId' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'completed' => ['required'],
        ]);

        DB::transaction(function () use ($request) {
            Task::where('id', $request->taskId)->update([
                'name' => $request->name,
                'description' => $request->description,
                'completed' => $request->completed,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Tarea Actualizada',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'taskId' => ['required'],
        ]);

        DB::transaction(function () use ($request) {
            Task::where('id', $request->taskId)->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Tarea eliminada con exito',
        ]);
    }
}
