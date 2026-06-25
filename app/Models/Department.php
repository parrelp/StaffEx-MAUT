<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'id_department';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'description',
        'type',
        'department_photo',
    ];
}
