@foreach ($doctors as $doctor)
    <a href="{{ route('doctors.show', $doctor) }}">{{ $doctor->doctor_name }}</a><br>
@endforeach