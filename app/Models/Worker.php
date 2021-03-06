<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profession()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
