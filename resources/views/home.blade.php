@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($todos as $todo)
                      <div>
                        {{ $todo->description }}
                      </div>
                      <div>
                        {{ $todo->user->name }}
                      </div>
                      <div>
                        {{ $todo->status() }}
                      </div>

                      @if (Auth::check())
                        <div>
                          <form method="post" action="{{ route('changeTodoStatus', $todo->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-warning" value="Change status">
                          </form>
                        </div>
                      @endif

                    @endforeach
                </div>
            </div>

            @if (Auth::check())
              <div class="card">
                  <div class="card-header">Create Todo</div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('createTodo') }}">
                        {{ csrf_field() }}
                        <input type="text" name="description" class="form-control">
                        <input type="submit" value="create!" class="btn btn-default">
                      </form>
                  </div>
              </div>
            @endif
        </div>
    </div>
</div>
@endsection
