<?php

namespace App\Http\Controllers;

use App\Jobs\SendAppointmentConfirmationEmail;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
    
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time_slot' => 'required',
        ]);

        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('time_slot', $request->time_slot)
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->with('error', 'This time slot is not available for the selected date.');
        }

        $appointment = new Appointment();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->user_id = auth()->id();
        $appointment->date = $request->date;
        $appointment->time_slot = $request->time_slot;
        $appointment->save();

        
        SendAppointmentConfirmationEmail::dispatch($appointment);
        return redirect()->back()->with('success', 'Appointment booked successfully.');
    }
}
