<?php

namespace App\Http\Controllers;

use App\todo_list;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Response $response)
    {

        try {
            $content = $request->content;
            $list = new todo_list;
            $list->content = $content;
            $list->isDone = false;

            $list->save();

            return response()->json([
                'status' => 'success',
                'message' => 'ceated',
                'data' => $list,
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e,
            ], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo_list  $todo_list
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $showDone = $request->showDone ? $request->showDone : 'false';

        try {
            $list = todo_list::where('isDone', $showDone)->get();
            return response()->json([
                'status' => 'success',
                'data' => $list,
            ], 200);
        } catch (exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e,
            ], 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo_list  $todo_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, todo_list $todo_list)
    {
        try {
            $todo_list->content = $request->content;
            $todo_list->save();
            return response()->json([
                'status' => 'success',
                'message' => 'updated',
            ], 200);
        } catch (exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e,
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo_list  $todo_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo_list $todo_list)
    {
        try {
            $todo_list->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'deleted',
            ], 200);
        } catch (exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e,
            ], 400);
        }
    }
}
