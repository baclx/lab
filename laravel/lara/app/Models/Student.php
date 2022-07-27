<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'gender',
        'birth_date',
        'status',
        'course_id',
    ];

    public function course(): BelongsTo
    {
        // belongsTo
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function getAgeAttribute(): int {
        return date_diff(date_create($this->birth_date), date_create('now'))->y;
    }

    public function getGenderNameAttribute(): String {
        return ($this->gender === 0) ? "Male" : "Female";
    }

    public function getAllCreatedAtAttribute() {
        return $this->created_at->format('d-m-y');
    }
}
