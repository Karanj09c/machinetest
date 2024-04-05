@extends('admin::layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Doctor Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form name="newsDetailForm" id="main" method="post"
                                    action="{{ url('admin/doctors/store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div
                                                class="form-group mb-3 {{ $errors->has('doctor_name') ? 'has-danger' : '' }}">
                                                <label class="col-form-label">{{ 'Title' }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('doctor_name') ? 'form-control-danger' : '' }}"
                                                    name="doctor_name" type="text" value="{{ old('doctor_name') }}"
                                                    placeholder="Enter doctor name">
                                                @error('doctor_name')
                                                    <div class="col-form-alert-label">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div
                                                class="form-group mb-3 {{ $errors->has('doctor_speciality') ? 'has-danger' : '' }}">
                                                <label class="col-form-label">{{ 'Title' }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('doctor_speciality') ? 'form-control-danger' : '' }}"
                                                    name="doctor_speciality" type="text" value="{{ old('doctor_speciality') }}"
                                                    placeholder="Enter doctor name">
                                                @error('doctor_speciality')
                                                    <div class="col-form-alert-label">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer"> <button type="submit"
                                            class="btn btn-primary">save</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection