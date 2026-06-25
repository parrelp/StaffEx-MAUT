<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryFinalRankDetail extends Model
{
    protected $table = 'history_final_rank_details';
    protected $primaryKey = 'id_history_detail';
    public $timestamps = false;

    protected $fillable = ['history_id', 'candidate_id', 'final_score', 'rank'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}


?>