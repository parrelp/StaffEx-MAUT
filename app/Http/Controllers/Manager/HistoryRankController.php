<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\HistoryFinalRank;
use App\Models\DepartmentManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HistoryRankController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id_user;

        $departmentManager = DepartmentManager::where('user_id', $userId)->first();
        if (!$departmentManager) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $departmentId = $departmentManager->department_id;

        $histories = HistoryFinalRank::with(['department', 'user'])
            ->where('department_id', $departmentId)
            ->orderByDesc('saved_at')
            ->get();

        return view('manager.history_rank.index', compact('histories'));
    }

    public function saveHistory(Request $request)
    {
        $userId = Auth::id();

        $departmentManager = DepartmentManager::where('user_id', $userId)->first();
        if (!$departmentManager) {
            dd("Tidak ditemukan department manager untuk user id: " . $userId);
        }

        $departmentId = $departmentManager->department_id;

        $countFinal = DB::table('final_scores')
            ->where('department_id', $departmentId)
            ->count();

        if ($countFinal == 0) {
            return redirect()->back()->with('error', 'Tidak ada data final score untuk disimpan.');
        }


        try {
            DB::statement("CALL save_final_rank_history(?, ?)", [$userId, $departmentId]);
        } catch (\Exception $e) {
            dd("Prosedur error: " . $e->getMessage());
        }

        return redirect()->route('manager.history-rank.index')->with('success', 'Final Rank berhasil disimpan ke History.');
    }


    public function show($id)
    {
        $userId = Auth::id();

        // Cek akses departemen manager
        $departmentManager = DepartmentManager::where('user_id', $userId)->first();
        if (!$departmentManager) {
            abort(403);
        }

        $history = HistoryFinalRank::with(['details.candidate', 'department', 'user'])
            ->where('id_history', $id)
            ->where('department_id', $departmentManager->department_id)
            ->firstOrFail();

        return view('manager.history_rank.show', compact('history'));
    }
}
