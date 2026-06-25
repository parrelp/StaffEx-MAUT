<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentsDataController extends Controller
{
    public function index()
    {
        $departments = Department::whereNull('deleted_at')->get(); // hanya department yang tidak soft-delete
        return view('admin.departments_data.index', compact('departments'));
    }

    public function addDepartment()
    {
        return view('admin.departments_data.add_department');
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:Departemen,Biro',
            'description' => 'nullable|string',
            'department_photo' => 'required|image|mimes:jpg,jpeg,png|max:10240', // 10MB
        ]);

        // Upload photo
        if ($request->hasFile('department_photo')) {
            $file = $request->file('department_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);
        }

        Department::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'department_photo' => $filename,
        ]);

        return redirect()->route('admin.departments-data.index')->with('success', 'Department added successfully!');
    }

    public function detailsDepartment($id)
    {
        $department = \App\Models\Department::findOrFail($id);
        return view('admin.departments_data.details_department', compact('department'));
    }

    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments_data.edit_department', compact('department'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:Departemen,Biro',
            'description' => 'nullable|string',
            'department_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Cek apakah ada file baru di-upload
        if ($request->hasFile('department_photo')) {
            // Hapus file lama jika ada
            if ($department->department_photo && Storage::exists('public/images/' . $department->department_photo)) {
                Storage::delete('public/images/' . $department->department_photo);
            }

            $file = $request->file('department_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
            $department->department_photo = $filename;
        }

        // Update data
        $department->name = $request->input('name');
        $department->type = $request->input('type');
        $department->description = $request->input('description');
        $department->save();

        return redirect()->route('admin.departments-data.index')->with('success', 'Department updated successfully!');
    }

    // CANDIDATES DEPARTMENT

    public function candidatesDepartmentList($id)
    {
        $department = Department::findOrFail($id);

        $candidates = Candidate::where('department_id', $id)
            ->whereNull('deleted_at')
            ->get();

        return view('admin.departments_data.candidates_department_list', compact('candidates', 'department'));
    }

    public function addCandidateDepartment($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments_data.add_candidate_department', compact('department'));
    }

    public function storeCandidateDepartment(Request $request, $id)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id_department',
            'name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:10240', // max 10MB
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('storage/images', 'public');
        }

        Candidate::create($validated);

        return redirect()->route('admin.departments-data.candidates-department-list', ['id' => $id])->with('success', 'Candidate added successfully.');
    }


    public function editCandidateDepartment($id)
    {
        $candidate = Candidate::findOrFail($id);

        return view('admin.departments_data.edit_candidate_department', compact('candidate'));
    }

    public function updateCandidateDepartment(Request $request, $id, $id_department)
    {
        $candidate = Candidate::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($candidate->photo && Storage::disk('public')->exists($candidate->photo)) {
                Storage::disk('public')->delete($candidate->photo);
            }

            $validated['photo'] = $request->file('photo')->store('candidates/photos', 'public');
        }

        $candidate->update($validated);

        return redirect()->route('admin.departments-data.candidates-department-list', ['id' => $id_department])->with('success', 'Candidate updated successfully.');
    }

    
}
