@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
@if (session('test') !== null)
<div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">User Created!</h4>
        <p>The newly created user has a password of: <b>{{session('test')}}</b></p>
        <hr>
        <p class="mb-0"></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

      </div>

@endif
                    @include('nav')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
