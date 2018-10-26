@auth
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">Create Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="viewed-tab" data-toggle="tab" href="#viewed" role="tab" aria-controls="viewed" aria-selected="false">Viewed</a>
        </li>
        @if (Auth::user()->user_level >= '2')
        <li class="nav-item">
          <a class="nav-link" id="add_user-tab" data-toggle="tab" href="#add_user" role="tab" aria-controls="add_user" aria-selected="false">Add User</a>
        </li>
        @endif

    </ul>
@endauth
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @table(['tasks' => $self])
            @endtable
        </div>
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            @table(['tasks' => $tasks->where('status','completed')])
            @endtable
        </div>
        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            @table(['tasks' => $tasks->where('status','pending')])
            @endtable
        </div>
        <div class="tab-pane fade" id="viewed" role="tabpanel" aria-labelledby="viewed-tab">
            @table(['tasks' => $tasks->where('status','viewed')])
            @endtable
        </div>
        <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
                <form action="">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                          <label for="text" class="col-12 col-form-label">Enter Title here</label>
                          <div class="col-12">
                            <input id="text" name="task_title" placeholder="Enter Title here" class="form-control here" required="required" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="textarea" class="col-12 col-form-label">Description</label>
                          <div class="col-12">
                            <textarea id="textarea" name="task_textarea" cols="40" rows="5" class="form-control"></textarea>
                          </div>
                        </div>
                      </form>
        </div>

        <div class="tab-pane fade" id="add_user" role="tabpanel" aria-labelledby="add_user-tab"><br />
                <form method="post" action="{{route('create_user')}}">
                        @csrf

                        <div class="form-group row">
                          <label for="name" class="col-3 col-form-label"><b>Name</b></label>
                          <div class="col-5">
                            <input id="name" name="user_name" placeholder="Ex. John Smith" class="form-control here" required="required" type="text">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="number" class="col-3 col-form-label">Employee Number</label>
                          <div class="col-2">
                            <input id="number" name="user_number" placeholder="Ex. 85088" class="form-control here" required="required" type="text">
                          </div>
                          <label for="district" class="col-1 col-form-label">District</label>
                          <div class="col-2">
                                <select id="district" class="custom-select" name="user_district">
                                @foreach (App\District::all() as $district)
                                <option value="{{$district->number}}">{{$district->name}}</option>
                                @endforeach
                                </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="level" class="col-3 col-form-label">Employee Level</label>
                          <div class="col-2">
                                <select id="level" class="custom-select" name="user_level">
                                        <option selected value="0">User</option>
                                        <option value="1">Gl</option>
                                        <option value="2">Admin</option>
                                      </select>
                          </div>
                        </div>

                        <div class="form-group row">
                                <label for="password" class="col-3 col-form-label">Password</label>
                                <div class="col-2">
                                  <input id="password" name="user_password" placeholder="" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                    <div class="col-2">
                                      <button type="submit" class="btn btn-primary">Create User</button>
                                    </div>
                                  </div>


                    </form>
        </div>


      </div>
</div>
