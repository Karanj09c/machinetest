<?php

namespace App\Jobs;

use App\Mail\SendMailAppointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAppointmentConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  
    protected $appointment;

    public function __construct($appointment)
    {
        //
        $this->appointment = $appointment;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Send the email
        Mail::to($this->appointment->user->email)
            ->send(new SendMailAppointment($this->appointment));
    }
}
