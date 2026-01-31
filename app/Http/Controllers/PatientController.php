<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Muestra el formulario
    public function create()
    {
        return view('doctor.create-patient');
    }

    // Guarda los datos en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'curp' => 'required|string|unique:patients',
            'fecha_nacimiento' => 'required|date',
        ]);

        Patient::create([
            'nombre_completo' => $request->nombre_completo,
            'curp' => $request->curp,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'user_id' => auth()->id(), // El ID del doctor logueado
        ]);

        return redirect()->route('doctor.dashboard')->with('success', 'Paciente registrado con éxito.');
    }

    public function index()
{
    // Trae todos los pacientes de la base de datos
    $patients = Patient::all(); 
    return view('doctor.index-patients', compact('patients'));
}
}

