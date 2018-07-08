<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function createTodo(Request $request)
    {
      Todo::create(['description' => $request->description,
                    'user_id' => Auth::user()->id]);
      return redirect(route('home'));
    }

    public function changeStatus(Request $request)
    {
      $todo = Todo::find($request->id);
      $todo->status = !$todo->status;

      $todo->save();
      return redirect(route('home'));
    }
}
