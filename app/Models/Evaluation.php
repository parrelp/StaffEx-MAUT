<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $primaryKey = 'id_evaluation';
    public $timestamps = false;

    protected $fillable = [
        'candidate_id', 'manager_id', 'department_id', 'criteria_id', 'score'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id_candidate');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id_criteria');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id_user');
    }
}
