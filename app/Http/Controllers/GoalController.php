<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Auth::user()->goals;
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);
        Auth::user()->goals()->create($request->all());
        return redirect()->route('goals.index');
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $goal->update($request->all());
        return redirect()->route('goals.index');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index');
    }
}
