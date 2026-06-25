<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\DepartmentManager;

use App\Models\FinalScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CandidateRankController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data manager dari tabel department_manager
        $departmentManager = DepartmentManager::where('user_id', $user->id_user)->first();

        if (!$departmentManager) {
            abort(403, 'Manager tidak memiliki departemen.');
        }

        // Simpan department_id dan id_manager
        $departmentId = $departmentManager->department_id;
        $idManager = $departmentManager->id_manager;

        // Ambil final scores dari kandidat di departemen tersebut
        $ranked = FinalScore::with('candidate')
            ->where('department_id', $departmentId)
            ->orderByDesc('final_score')
            ->get();

        $bestCandidates = $ranked->take(3);
        $otherCandidates = $ranked->skip(3);

        return view('manager.candidates_rank.index', compact('bestCandidates', 'otherCandidates'));
    }

    public function stats($id)
    {
        $score = FinalScore::with('candidate')->where('candidate_id', $id)->firstOrFail();

        $criteriaScores = DB::table('final_score_details as fsd')
            ->join('criteria as cr', 'fsd.criteria_id', '=', 'cr.id_criteria')
            ->join('final_scores as fs', 'fs.id_final', '=', 'fsd.final_id')
            ->select('cr.name as criteria', 'fsd.weighted_score as score', 'cr.weight')
            ->where('fs.candidate_id', $id)
            ->orderBy('cr.id_criteria')
            ->get();

        return view('manager.candidates_rank.stats', compact('score', 'criteriaScores'));
    }

    public function generate(Request $request)
    {
        try {
            DB::statement('CALL generate_candidate_criteria_averages()');
            DB::statement('CALL update_criteria_range()');
            DB::statement('CALL calculate_final_scores_and_ranking()');

            // Dapatkan manager yang login
            $user = Auth::user();
            $manager = \App\Models\DepartmentManager::where('user_id', $user->id_user)->first();

            if ($manager) {
                // Update semua kandidat di departemen manager tersebut
                \App\Models\Candidate::where('department_id', $manager->department_id)
                    ->update(['status' => 'sudah_dinilai']);
            }

            return redirect()->route('manager.candidate-rank.index')->with('success', 'Perhitungan ranking berhasil dijalankan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menjalankan perhitungan: ' . $e->getMessage());
        }
    }





}
