<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\AuthController;
// Admin Path
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UsersDataController as UsersData;
use App\Http\Controllers\Admin\DepartmentsDataController as DepartmentsData;
use App\Http\Controllers\Admin\CriteriasDataController as CriteriasData;
use App\Http\Controllers\Admin\AdminProfileController as AdminProfile;
// Manager Path
use App\Http\Controllers\Manager\DashboardController as ManagerDashboard;
use App\Http\Controllers\Manager\CandidateListController as ManagerCandidateList;
use App\Http\Controllers\Manager\CandidateRankController as ManagerCandidateRank;
use App\Http\Controllers\Manager\EvaluationController as ManagerEvaluation;
use App\Http\Controllers\Manager\HistoryRankController as ManagerHistoryRank;

// Onboarding page
Route::get('/', [OnboardingController::class, 'index'])->name('onboarding');

Route::get('/get-started', [AuthController::class, 'showLogin'])->name('get-started');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    // Users Data
    Route::get('/users-data', [usersData::class, 'index'])->name('admin.users-data.index');
    Route::get('/add-user', [usersData::class, 'addUser'])->name('admin.users-data.add-user');
    Route::post('/store-user', [usersData::class, 'storeUser'])->name('admin.users-data.store-user');
    Route::get('/edit-user/{id}', [usersData::class, 'editUser'])->name('admin.users-data.edit-user');
    Route::put('/update-user/{id}', [usersData::class, 'updateUser'])->name('admin.users-data.update-user');
    Route::get('/add-to-manager/{id}', [UsersData::class, 'addToManager'])->name('admin.users-data.add-to-manager');
    Route::post('/store-manager', [UsersData::class, 'storeManager'])->name('admin.users-data.store-manager');
    // Departments Data
    Route::get('/departments-data', [DepartmentsData::class, 'index'])->name('admin.departments-data.index');
    Route::get('/add-department', [DepartmentsData::class, 'addDepartment'])->name('admin.departments-data.add-department');
    Route::post('/store-department', [DepartmentsData::class, 'storeDepartment'])->name('admin.departments-data.store-department');
    Route::get('/details-department/{id}', [DepartmentsData::class, 'detailsDepartment'])->name('admin.departments-data.details-department');
    Route::get('/edit-department/{id}', [DepartmentsData::class, 'editDepartment'])->name('admin.departments-data.edit-department');
    Route::post('/update-department/{id}', [DepartmentsData::class, 'updateDepartment'])->name('admin.departments-data.update-department');


    Route::get('/candidates-department-list/{id}', [DepartmentsData::class, 'candidatesDepartmentList'])->name('admin.departments-data.candidates-department-list');
    Route::get('/add-candidate-department/{id}', [DepartmentsData::class, 'addCandidateDepartment'])->name('admin.departments-data.add-candidate-department');
    Route::post('/store-candidate-department/{id}', [DepartmentsData::class, 'storeCandidateDepartment'])->name('admin.departments-data.store-candidate-department');
    Route::get('/edit-candidate-department/{id}', [DepartmentsData::class, 'editCandidateDepartment'])->name('admin.departments-data.edit-candidate-department');
    Route::put('/update-candidate-department/{id}/{id_department}', [DepartmentsData::class, 'updateCandidateDepartment'])->name('admin.departments-data.update-candidate-department');
    // Criterias Data
    Route::get('/criterias-data', [CriteriasData::class, 'index'])->name('admin.criterias-data.index');
    Route::get('/add-criteria', [CriteriasData::class, 'addCriteria'])->name('admin.criterias-data.add-criteria');
    Route::get('/edit-criteria', [CriteriasData::class, 'editCriteria'])->name('admin.criterias-data.edit-criteria');
    Route::post('/save-criteria-weights', [CriteriasData::class, 'saveCriteriaWeights'])->name('admin.criterias-data.save-criteria-weights');
    // Admin Profile
    Route::get('/admin-profile', [AdminProfile::class, 'index'])->name('admin.admin-profile.index');
});

Route::middleware(['auth', \App\Http\Middleware\ManagerMiddleware::class])->prefix('manager')->group(function () {
    Route::get('/dashboard', [ManagerDashboard::class, 'index'])->name('manager.dashboard');

    // canidate list
    Route::get('/candidate-list', [ManagerCandidateList::class, 'index'])->name('manager.candidate-list.index');

    // candidate eval
    Route::get('/candidate-eval/{id}', [ManagerEvaluation::class, 'index'])->name('manager.candidate-eval.index');
    Route::post('/evaluations/save', [ManagerEvaluation::class, 'save'])->name('evaluations.save');
    Route::post('/candidates/{id}/evaluate', [ManagerEvaluation::class, 'store'])->name('evaluations.store');

    // candidate rank
    Route::get('/candidate-rank', [ManagerCandidateRank::class, 'index'])->name('manager.candidate-rank.index');
    Route::post('/candidate-rank/generate', [ManagerCandidateRank::class, 'generate'])->name('manager.candidate-rank.generate');
    Route::get('/candidate-stats/{id}', [ManagerCandidateRank::class, 'stats'])->name('manager.candidate-rank.stats');
    

    // History Rank
    Route::get('/history-rank', [ManagerhistoryRank::class, 'index'])->name('manager.history-rank.index');
    Route::post('/save-history', [ManagerhistoryRank::class, 'saveHistory'])->name('manager.history-rank.save-history');
    Route::get('/history-rank/{id}', [ManagerhistoryRank::class, 'show'])->name('manager.history-rank.show');
    
});
