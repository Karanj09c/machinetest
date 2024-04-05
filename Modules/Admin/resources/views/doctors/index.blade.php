@extends('admin::layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> All Doctors </h1>
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
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h3 class="card-title nofloat"> <span> All Doctors</span>
                                <span> 
                                    <a href="{{ url('admin/doctors/create') }}"> 
                                        <button type="button" class="btn btn-block btn-primary">Add a New Doctor</button> 
                                    </a> 
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
                                            <th>Spaciality</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($doctors as $key => $value)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$value->doctor_name}}</td>
                                                <td>{{$value->doctor_speciality}}</td>
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
@endsection