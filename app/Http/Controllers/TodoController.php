<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;
use Carbon\Carbon;


class TodoController extends Controller
{

    public function stillList(){
        $todos = TodoList::whereNull('completed_at')->get();
        return view('stillTodo',['todos'=>$todos]);
    }

    public function complete(Request $request){
        $todo = TodoList::find($request->id);
        $todo->completed_at = Carbon::now();
        $todo->save();

        return redirect('stillTodo');
    }

    public function still(Request $request){
        $todo = TodoList::find($request->id);
        $todo->completed_at = NULL;
        $todo->save();

        return redirect('completeTodo');
    }

    public function completeList(){
        $todos = TodoList::whereNotNull('completed_at')->get();
        return view('completeTodo',['todos'=>$todos]);
    }

    public function addForm(){
        return view('addForm');
    }

    public function add(Request $request){
        $validatedData=$request->validate([
            'title'=>'required|string|max:200',
            'memo'=>'required|string'
        ]);

        $todo = new TodoList();
        $todo->title = $request->title;
        $todo->memo = $request->memo;
        $todo->created_at = Carbon::now();
        $todo->updated_at = Carbon::now();
        $todo->save();

        return redirect('stillTodo');
    }

    public function editForm(Request $request){
        $todo = TodoList::find($request->id);
        if(is_Null($request->id)){
            return redirect('stillTodo');
        }
        return view('editForm',['todo'=>$todo]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'title'=>'required|string|max:200',
            'memo'=>'required|string'
        ]);

        $todo = TodoList::find($request->id);
        $todo->title = $request->title;
        $todo->memo = $request->memo;
        $todo->updated_at = Carbon::now();
        $todo->save();
        return redirect('stillTodo');
    }

    public function delete(Request $request){
        $validatedData = $request->validate([
            'ids'=>'array|required'
        ]);

        TodoList::destroy($request->ids);
        return redirect('stillTodo');
    }


}
