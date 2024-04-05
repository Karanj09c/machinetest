<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    .sidebar {
        height: 100vh;
        background-color: #f8f9fa;
    }

    .dashboard-header {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
    }

    .dashboard-card {
        background: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table-dashboard {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table-dashboard th,
    .table-dashboard td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .table-dashboard th {
        background-color: #f8f9fa;
    }
</style>

<body>
    welcome {{ Auth::user()->name ?? '' }}
    <form method="post" action="{{ url('logout') }}">
        @csrf
        <button type="submit"> logout</button>
    </form>

    <div class="container-fluid">
        <div class="row">
            <div class="dashboard-cards">
                <div class="dashboard-card">Total Booked Appointed
                    <h2>{{ Auth::user()->appointments()->count() ?? 0 }}</h2>

                </div>
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="dashboard-header">
                    <h1 class="h2">Dashboard</h1>
                    <p>This is a User dashboard.</p>
                </div>

                <table class="table-dashboard">
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor Speciality</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->doctor_name }}</td>
                            <th>{{ $doctor->doctor_speciality }}</th>
                            <th> <a href="{{ route('doctors.show', $doctor) }}">book</a><br></th>
                        </tr>
                    @endforeach
                </table>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
