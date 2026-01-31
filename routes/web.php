<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard genérico (redirige según el login inicial)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- RUTAS DE LA CLÍNICA CLICKDOC ---

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 👨‍⚕️ ESPACIO DEL DOCTOR (Solo para role: doctor)
    Route::middleware(['role:doctor'])->group(function () {
        
        // Panel Principal
        Route::get('/doctor/dashboard', function () {
            return view('doctor.dashboard');
        })->name('doctor.dashboard');

        // Gestión de Pacientes
        Route::get('/doctor/pacientes', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/doctor/pacientes/crear', [PatientController::class, 'create'])->name('patients.create');
        Route::post('/doctor/pacientes/guardar', [PatientController::class, 'store'])->name('patients.store');

        // Reportes
        Route::get('/doctor/reportes', function () {
            return "Aquí podrás descargar reportes en PDF, Excel y Word.";
        })->name('doctor.reportes');
    });

    // 👤 ESPACIO DEL PACIENTE (Solo para role: paciente)
    Route::middleware(['role:paciente'])->group(function () {
        Route::get('/paciente/dashboard', function () {
            return view('dashboard'); 
        })->name('paciente.dashboard');

        Route::get('/paciente/citas', function () {
            return "Aquí podrás agendar tus citas médicas.";
        })->name('paciente.citas');
    });
});

require __DIR__.'/auth.php';