<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    //
    public function index(Request $request) {
        $todos = Todo::all();
        return view('dashboard')->with(['todos' => $todos]);

    }
    public function byUserId(Request $request) {
        $todos = Todo::where('user_id', Auth::user()->id)->get();
        return view('dashboard')->with(['todos' => $todos]);

    }

    public function show(Request $request, $id){
        $todo = Todo::find($id);
        return view('show')->with(['todo' => $todo]);

    }
    public function edit(Request $request, $id){
        #....
        $todo = Todo::find($id);
        return view ('edit', ['todo' => $todo]);

    }
    public function update(Request $request, $id){
$todo = Todo::where('user_id', Auth::user()->id)->where('id', $id)->first();
if($todo){
$todo->title = $request->title;
$todo ->desc =$request->desc;
$todo->status = $request->status == 'on' ? 1 : 0;
if($todo->save()){
    return view('show', ['todo' => $todo]);
}
return ;
}
return;
    }
    public function create(Request $request){
       return view('add') ;
    }
    public function store(Request $request){
        # Validations before updating
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->desc = $request->desc;
        $todo->user_id = Auth::user()->id;
        if ($todo->save()) {
            return view('show', ['todo' => $todo]);
        }
        return ;
        
    }
    public function delete(Request $request, $id ){
        $todo = Todo::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if ($todo) {
            $todo->delete();
            return view('index');
        }
        return; // 404
    
    }
    
}
