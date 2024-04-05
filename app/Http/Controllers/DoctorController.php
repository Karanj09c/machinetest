<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\App\Models\Doctor;

class DoctorController extends Controller
{
    public function show(Doctor $doctor)
    {
        return view('doctor.show', compact('doctor'));
    }
}
