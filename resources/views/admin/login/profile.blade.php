@extends('admin.layout.master')

@section('title')
Profile
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">User <small>Profile</small></h1>
            </div>

            @include('admin.validation')

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.profile.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Name"
                            value="{{auth()->user()->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email"
                            value="{{auth()->user()->email}}" readonly />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Please Enter Phone"
                            value="{{auth()->user()->mobile}}" readonly />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"
                            placeholder="Please Enter Pasword" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password"
                            placeholder="Please Enter Confirm Password" />
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <form>
            </div>

        </div>

    </div>

</div>
@endsection
