<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_type extends Model
{
    protected $table;

    public function __construct()
    {
        $this->table = env('PREFIX').'tb_types';
    }
}
