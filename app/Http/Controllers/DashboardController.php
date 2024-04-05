<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\App\Models\Doctor;

class DashboardController extends Controller
{
     public function index()
    {
        // Retrieve list of doctors from database
        $doctors = Doctor::all();
        return view('dashboard', compact('doctors'));
    }
}
