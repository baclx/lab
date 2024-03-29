<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
    ];

    public function getAllCreatedAtAttribute() {
        return $this->created_at->format('d-m');
    }

}
