<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::all();
        // return view("todos.index", compact("todos"));
        return view("todos.index")->with("todos", $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("todos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [

            "name" => "required",
            "description" => "required"
        ]);

        $data = $request->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash("success", "Todo created successfully");
        return redirect("/todos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($todo)
    {
        //
        $todo = Todo::findOrFail($todo);
        return view("todos.show")->with("todo", $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($todo)
    {
        //

        $todo = Todo::find($todo);

        return view("todos.edit")->with("todo", $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todo)
    {
        //

        $this->validate(request(), [

            "name" => "required",
            "description" => "required"
        ]);

        $data = $request->all();
        $todo = Todo::find($todo);
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash("success", "Todo successfully updated");
        return redirect("/todos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($delete)
    {
        //

        $todo = Todo::find($delete);
        $todo->delete();
        session()->flash("danger", "Todo deleted successfully");
        return redirect("/todos");
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash("success" ,"Todo Completed");
        return redirect("/todos");
    }
}
