<?php

namespace App\Http\Controllers\Admin;
use App\Models\Criteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriteriasDataController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criterias_data.index', compact('criterias'));
    }

    public function saveCriteriaWeights(Request $request)
    {
        $weights = $request->input('weights');

        if (!$weights || !is_array($weights)) {
            return back()->with('error', 'Invalid weight data.');
        }

        $total = array_sum($weights);

        if ($total > 100) {
            return back()->with('error', 'Total weight exceeds 100%. Please adjust.');
        } elseif ($total < 100) {
            return back()->with('error', 'Total weight must be exactly 100%.');
        }

        foreach ($weights as $id => $value) {
            $criteria = Criteria::find($id);
            if ($criteria) {
                $criteria->weight = $value / 100; // Convert to decimal
                $criteria->save();
            }
        }

        return back()->with('success', 'Weights saved successfully.');
    }

    public function addCriteria()
    {
        return view('admin.criterias_data.add_criteria');
    }

    public function editCriteria()
    {
        return view('admin.criterias_data.edit_criteria');
    }
}
