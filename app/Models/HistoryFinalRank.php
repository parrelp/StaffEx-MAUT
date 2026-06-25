<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryFinalRank extends Model
{
    protected $table = 'history_final_rank';
    protected $primaryKey = 'id_history';
    public $timestamps = false;

    protected $fillable = ['department_id', 'saved_at', 'saved_by'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id_department');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'saved_by', 'id_user');
    }

    public function details()
    {
        return $this->hasMany(HistoryFinalRankDetail::class, 'history_id', 'id_history');
    }
}