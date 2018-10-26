<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $self = Task::where('user_id',Auth::user()->id)->get();
        return view('home',compact('tasks','self'));
    }

    public function show(Task $task)
    {

        return view('task',compact('task'));
    }
    public function store(Task $task, Request $request)
    {
            $task->comment = $request->comment;
            $task->status = 'completed';
            $task->completed_by = Auth::user()->name;
            $task->save();
            return redirect()->back();
//        $task = new Task();
//        $task->
    }
}
