<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// class course như 1 đb -> là nó
// nv: xử lý dữ liệu định dạng format or tính toán ... trong đb
class Course extends Model
{
    use HasFactory;

    // cho phép những cột có thể điền đc | except xog bị cảnh báo bảo mật
    protected $fillable = [
        'name',
    ];

    // chú ý All cả bên all_created_at -> course.index
    public function getAllCreatedAtAttribute() {
        return $this->created_at->format('d-m-y');
    }

    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
