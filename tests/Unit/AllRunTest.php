<?php

namespace Tests\Unit;

use App\todo_list;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AllRunTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function testExample()
    {
        // create
        $create = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', 'api/create', ['content' => 'todolist test']);

        $create
            ->assertStatus(201)
            ->assertJson([
                'status' => 'success',
            ]);

        $getAll = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->get('api/getList');

        $getAll
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);

        // update
        $item = todo_list::where('isDone', false)->get()->random();

        $update = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('PATCH', "api/edit/$item->id", [
            'content' => 'todolist test2',
        ]);

        $update
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);

        //delete
        $delete = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->delete("api/delete/$item->id");

        $delete
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);

    }
}
