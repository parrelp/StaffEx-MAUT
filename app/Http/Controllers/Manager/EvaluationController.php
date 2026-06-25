<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\DepartmentManager;
use App\Models\Criteria;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;



class EvaluationController extends Controller
{
    public function index($id)
    {
        $candidate = Candidate::with('department')->findOrFail($id);
        $criteria = Criteria::all();
            // Cari manager berdasarkan user yang login
        $userId = Auth::id();
        $manager = DepartmentManager::where('user_id', $userId)->firstOrFail();
        $managerId = $manager->id_manager;

        // Ambil semua nilai evaluasi sebelumnya oleh manager ini untuk kandidat ini
        $existingEvaluations = Evaluation::where('candidate_id', $id)
            ->where('manager_id', $managerId)
            ->pluck('score', 'criteria_id'); // hasil: [criteria_id => score]

        return view('manager.candidates_eval.index', compact('candidate', 'criteria', 'existingEvaluations'));
    }

    public function store(Request $request, $candidate_id)
    {
        $candidate = Candidate::findOrFail($candidate_id);
        $userId = Auth::id();

        // Ambil id_manager dari tabel department_manager
        $manager = DepartmentManager::where('user_id', $userId)->firstOrFail();
        $managerId = $manager->id_manager;

        $departmentId = $candidate->department_id;
        $criteriaScores = $request->input('scores', []);

        foreach ($criteriaScores as $criteriaId => $score) {
            Evaluation::updateOrCreate(
                [
                    'candidate_id' => $candidate_id,
                    'manager_id' => $managerId,
                    'criteria_id' => $criteriaId
                ],
                [
                    'department_id' => $departmentId,
                    'score' => $score
                ]
            );
        }

        $candidate->update(['status' => 'sedang_dinilai']);
        return redirect()->route('manager.candidate-list.index')->with('success', 'Evaluasi berhasil disimpan!');
    }


    public function save(Request $request)
    {
        $candidate_id = 3; // atau ambil dari route/parameter
        $manager_id = 1;
        $department_id = 1;
        $scores = $request->input('scores', []);

        foreach ($scores as $criteria_id => $score) {
            // Jika data sudah ada, update, jika tidak, insert
            Evaluation::updateOrCreate(
                [
                    'candidate_id' => $candidate_id,
                    'manager_id' => $manager_id,
                    'department_id' => $department_id,
                    'criteria_id' => $criteria_id
                ],
                [
                    'score' => $score
                ]
            );
        }

        return redirect()->back()->with('success', 'Penilaian disimpan.');
    }



}
