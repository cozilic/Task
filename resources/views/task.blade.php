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
                    @php
                    App\Classes\ViewedBy::insert_to_viewed($task->id,Auth::user()->id)
                    @endphp
                    @if ($task->status == 'pending')
                    @php
                    App\Classes\ViewedBy::insert_viewed($task->id)
                    @endphp
                    @endif
                    @endif
                        Status: <span class="text-{{$task->status}}">{{$task->status}}</span><br /><br />
                        @if (App\TaskView::where('task_id', $task->id) !== Null)
                            Viewed by: <br /><br />
                            @foreach (App\TaskView::where('task_id',$task->id)->select('user_id')->distinct()->get() as $viewed_by)
                            {{ $loop->first ? '' : ',' }}
                                {{$viewed_by->user->name}}
                            @endforeach
                            @else
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
                        <br /><br />
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
