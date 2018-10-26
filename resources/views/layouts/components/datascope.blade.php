<table class="table">
    <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Title</th>
          <th scope="col">Text</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('task',$task->id)}}">{{$task->title}}</a></td>
                    <td>{{$task->text}}</td>
                    <td><span class="text-{{$task->status}}">{{$task->status}}</span></td>
                </tr>
            @endforeach
      </tbody>
    </table>
