<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\DepartmentManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CandidateListController extends Controller
{
    public function index()
    {
        $candidates = Candidate::getByManagerDepartment();

        return view('manager.candidates_list.index', compact('candidates'));
    }
}
