<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    protected $primaryKey = 'id_final';
    protected $table = 'final_scores';
    public $timestamps = false;

    protected $fillable = [
        'candidate_id', 'department_id', 'final_score', 'rank'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id_candidate');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
