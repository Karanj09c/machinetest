@extends('admin::layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> All users </h1>
                    </div>
                </div>
                <div class="all_user_title">

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if (Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <h3 class="card-title nofloat"> <span> All Users</span>
                                    <span>

                                    </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div id="free" class="tabcontent">
                                    <table id="example2" class="table tables table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>

                                                <th>Status</th>
                                                <th>Verified</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $value)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>

                                                    <td>{{ $value->status == 0 ? 'unverified' : 'verified' }}</td>
                                                    <td>
                                                        <select class="update-status" data-doctor-id="{{ $value->id }}">
                                                            <option value="1" {{$value->status == 1 ? 'selected': '' }} >Verified</option>
                                                            <option value="0"  {{$value->status == 0 ? 'selected': '' }} >Not Verified</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
        $('.update-status').change(function() {
            var status = $(this).val();
            var doctorId = $(this).data('doctor-id');
            $.ajax({
                url: "{{ url('admin/update-status') }}", 
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    doctor_id: doctorId
                },
                success: function(response) {
                    console.log(response);
                    if(response.status == true) {
                        alert(response.message);
                        window.location.reload()
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    </script>
@endsection
