@extends('admin.layout.master')

@section('title')
User - Create
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">User <small>Add</small></h1>
            </div>

            @include('admin.validation')

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Name"
                            value="{{old('name')}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email"
                            value="{{old('email')}}" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Please Enter Phone"
                            value="{{old('phone')}}" />
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
                    <div class="form-group">
                        <label>Is Admin</label>
                        <label class="radio-inline">
                            <input name="is_admin" value="0" checked type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="is_admin" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Create</button>
                    <form>
            </div>

        </div>

    </div>

</div>
@endsection
