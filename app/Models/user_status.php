<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_status extends Model
{
    protected $table;

    public function __construct()
    {
        $this->table = env('PREFIX').'user_statuses';
    }
}
