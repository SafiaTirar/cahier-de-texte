<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\AuthController;



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
    Route::post('admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::get('admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    Route::get('admin/filieres', [AdminController::class, 'indexFilieres'])->name('admin.filieres.index');
    Route::post('admin/filieres', [AdminController::class, 'storeFiliere'])->name('admin.filieres.store');

    Route::get('admin/matieres', [AdminController::class, 'indexMatieres'])->name('admin.matieres.index');
    Route::post('admin/matieres', [AdminController::class, 'storeMatiere'])->name('admin.matieres.store');

    Route::get('admin/groupes', [AdminController::class, 'indexGroupes'])->name('admin.groupes.index');
    Route::post('admin/groupes', [AdminController::class, 'storeGroupe'])->name('admin.groupes.store');

    Route::get('admin/affectations', [AdminController::class, 'indexAffectations'])->name('admin.affectations.index');
    Route::get('/admin/affectations/create', [AdminController::class, 'createAffectation'])->name('admin.affectations.create');
    Route::post('admin/affectations', [AdminController::class, 'storeAffectation'])->name('admin.affectations.store');
    Route::delete('/admin/affectations/{id}', [AdminController::class, 'destroyAffectation'])->name('admin.affectations.destroy');
    // Routes pour la modification des affectations
    Route::get('/admin/affectations/{id}/edit', [AdminController::class, 'editAffectation'])->name('admin.affectations.edit');
    Route::put('/admin/affectations/{id}', [AdminController::class, 'updateAffectation'])->name('admin.affectations.update');
    

});
Route::middleware(['auth', 'role:prof'])->group(function () {
    Route::get('/prof/dashboard', [ProfController::class, 'dashboard'])->name('prof.dashboard');
    Route::get('/prof/saisir-avancement', [ProfController::class, 'saisirAvancement'])->name('prof.saisir-avancement');
    Route::post('/prof/seances', [ProfController::class, 'storeSeance'])->name('prof.seances.store');

    
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


