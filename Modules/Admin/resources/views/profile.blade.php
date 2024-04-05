@extends('admin::layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $common['title']}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Setting</a></li>
                        <li class="breadcrumb-item active">{{$common['title']}}</li>
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
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-body">
                                <form action="{{ url('admin/admin-contacts') }}" name="AdminContactDetailsForm" id="main" 
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('title') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Title*</label>
                                            <input
                                                class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}"
                                                name="title" type="text"
                                                value="{{ $getAdminContactDetails->title }}" placeholder="Enter title">      
                                            @error('title')
                                                <div class="col-form-alert-label">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('email') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Email*</label>
                                            <input
                                                class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}"
                                                name="email" type="email"
                                                value="{{ $getAdminContactDetails->email }}" placeholder="Enter email">      
                                            @error('email')
                                                <div class="col-form-alert-label">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('address') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Address*</label>
                                            <input
                                                class="form-control {{ $errors->has('address') ? 'form-control-danger' : '' }}"
                                                name="address" type="text"
                                                value="{{ $getAdminContactDetails->address }}" placeholder="Enter address">      
                                            @error('address')
                                                <div class="col-form-alert-label">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 {{ $errors->has('phone_number') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Phone Number*</label>
                                            <input
                                                class="form-control {{ $errors->has('phone_number') ? 'form-control-danger' : '' }}"
                                                name="phone_number" type="text"
                                                value="{{ $getAdminContactDetails->phone_number }}" placeholder="Enter Phone Number">      
                                            @error('phone_number')
                                                <div class="col-form-alert-label">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 {{ $errors->has('description') ? 'has-danger' : '' }}">
                                            <label class="col-form-label">Description*</label>
                                            <textarea
                                            class="form-control summernote {{ $errors->has('description') ? 'form-control-danger' : ''}}"
                                            name="description" type="message"
                                                placeholder="Enter Description">{{ $getAdminContactDetails->description }}</textarea>  
                                            @error('description')
                                                <div class="col-form-alert-label">
                                                {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> 
                                </div>
                                <div class="card-footer"> <button type="javascript:;" class="btn btn-primary">{{$common['button']}}</button> </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.alert-dismissible').fadeOut(4000);
    });
</script>
@endsection

