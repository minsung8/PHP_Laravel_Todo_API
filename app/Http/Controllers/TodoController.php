<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 데이터 목록 가져오기
    {
        $allTodos = Todo::all();

        // $allTodos = Todo::select('id', 'title', 'content')->get();

        $filteredTodos = TodoResource::collection($allTodos);
        return $filteredTodos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()    // 새로운 데이터를 만드는 화면을 반환
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)     // 새로운 데이터 추가
    {
        $userInputData = $request->all();

        $newTodo = Todo::create($userInputData);

        return new TodoResource($newTodo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)       // 특정 데이터 가져오기
    // {
    //     $fetchedTodo = Todo::find($id);

    //     $filteredTodo = new TodoResource($fetchedTodo);
    //     return $filteredTodo;
    // }

    public function show(Todo $todo)       // 특정 데이터 가져오기
    {
        // $fetchedTodo = Todo::find($id);

        $filteredTodo = new TodoResource($todo);
        return $filteredTodo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)       // 기존 데이터를 수정하는 화면을 반환
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)       // 기존 데이터를 수정 -> 수정된 데이터를 반환
    {
        // $fetchedTodo = Todo::find($id);
        $todo->update($request->all());

        $updatedTodo = new TodoResource($todo);

        return $updatedTodo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)        // 기존 데이터를 삭제
    {
        // $fetchedTodo = Todo::find($id);
        $todo->delete();

        return response()->json(null, 204);
    }
}
