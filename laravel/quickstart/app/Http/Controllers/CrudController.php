<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $todo = Task::all();
        return view('home')->with(compact('todo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255'
        ]);
        $todo = Task::create($data);

        return response()->json($todo, 200);
    }
}
