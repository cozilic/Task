@extends('layouts.app')
@section('content')
<div class="container">
        <div class="card">
                <div class="card-header">
                    Viewing: {{$task->title}}
                </div>
                <div class="card-body">
                    {{$task->user->name}} Wrote:<br /><br />
                    {{$task->text}}<br /><br />
                    @if (Auth::user()->user_level >= '1')
                    @if ($task->viewed_by !== Null)
                    @php
$task_view = new App\TaskView;
$task_view->user_id = Auth::user()->id;
$task_view->task_id = $task->id;
$task_view->save();

//                    $task->view->attach();
//                    $task->save();

                    @endphp
                    @endif
                    @if ($task->status == 'pending')
                    @php
                    $task_view = new App\TaskView;
                    $task_view->user_id = Auth::user()->id;
                    $task_view->task_id = $task->id;
                    $task_view->save();

//                    DB::table('viewedBy')
//                    ->where('task_id', $task->id)
//                    ->update(['viewed_by' => + Auth::user()->name]);
//                      $user = App\User::find($task->user_id)->get();
//                      $user->task->attach();
//                      $task->save();

@endphp
                    @endif
                    @endif

                    Status: <span class="text-{{$task->status}}">{{$task->status}}</span><br /><br />
                        @if (isSet($task->viewed_by))
                            Viewed by: {{$task->viewed_by}}<br /><br />
                        @endif
                    @if (Auth::user()->user_level >= '1')
                    @if ($task->status !== 'completed')
                    <hr>
                        <form action="{{route('store_task',$task->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <label for="comment">Write a comment</label><br />
                            <textarea name="comment" id="comment" cols="55" rows="3"></textarea><br />
                            <button class="btn btn-primary" type="submit">Mark as completed</button>
                        </form>
                        @else
                        <div class="card">
                            <div class="card-header">Completed by: {{$task->completed_by}}</div>
                            <div class="card-body">
                                {{$task->comment}}
                            </div>
                        </div>
                        @endif
                        @endif
                </div>
            </div>
</div>
@endsection
