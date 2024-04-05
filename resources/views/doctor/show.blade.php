<h2>Doctor Name : - {{ $doctor->doctor_name ?? '' }}</h2>
@if (session('error'))
    <div style="color:red" class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div style="color:green" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('appointments.store') }}">
    @csrf
    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
    <input type="date" name="date" required>
    <select name="time_slot" required>

        <option value="10:00">10:00 AM</option>
        <option value="10:30">10:30 AM</option>
        <option value="11:00">11:00 AM</option>

        <option value="11:30">11:30 AM</option>
        <option value="12:00">12: 00 AM</option>
        <option value="12:30">12:30 PM</option>
        <option value="01:00">1:00 PM</option>
        <option value="01:30">01:30 PM</option>

    </select>
    <button type="submit">Book Appointment</button>
</form>
