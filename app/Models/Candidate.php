<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'id_candidate';
    public $timestamps = false;

    protected $fillable = [
        'name', 'class', 'email', 'phone_number', 'address',
        'photo', 'document', 'department_id', 'status'
    ];
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'candidate_id', 'id_candidate');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id_department');
    }

    public static function getByManagerDepartment()
    {
        $user = Auth::user();

        // Cari department manager berdasarkan user yang login
        $manager = DepartmentManager::where('user_id', $user->id_user)->first();

        if (!$manager) {
            return collect(); // atau throw exception jika perlu
        }

        return self::where('department_id', $manager->department_id)->get();
    }

    // Ambil kata pertama dari name
    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }
    

    // Candidate Rank
    public function finalScore()
    {
        return $this->hasOne(FinalScore::class, 'candidate_id', 'id_candidate');
    }

    // Accessor foto (dengan fallback default)
    public function getPhotoUrlAttribute()
    {
        return asset('storage/images/' . (!empty($this->photo) ? $this->photo : 'user.png'));
    }
}
