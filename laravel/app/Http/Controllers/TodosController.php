<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use DB;

class TodosController extends Controller
{
    protected function getUserId(){

        return auth()->user()->id;
    }

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$user = Auth::user()->id;
        $userId = \Auth::user()->id;
        #$todos = Todos::orderBy('title', 'asc')->paginate(10);
        $todos = Todos::where('user_id', $userId)->get();
        #$todos =  DB::select("SELECT * FROM todos");
        return view('todos')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
        ]);
        //create Todo
        $todo = new Todos;
        $userId = $this->getUserId();
        $todo->user_id = $userId; 
        $todo->title = $request->input('title'); 
        $todo->description = $request->input('description'); 
        $todo->save();

        return redirect('/todos')->with('success','Todo list created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todos::find($id);
        return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todos::find($id);
        return view('todos.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
        ]);
        //create Todo
        $todo = Todos::find($id);
        $userId = $this->getUserId();
        $todo->user_id = $userId; 
        $todo->title = $request->input('title'); 
        $todo->description = $request->input('description'); 
        $todo->save();

        return redirect('/todos')->with('success','Todo list updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::find($id);
        $todo->delete();

        return redirect('/todos')->with('success','Record Deleted');
    }
}
