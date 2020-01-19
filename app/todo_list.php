<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo_list extends Model
{
    protected $table = 'todo_lists';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}
