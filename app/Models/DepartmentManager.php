<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentManager extends Model
{
    protected $table = 'department_manager';
    protected $primaryKey = 'id_manager';
    // public $timestamps = false;

    protected $fillable = [
        'user_id', 'department_id', 'position'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id_department');
    }
}
