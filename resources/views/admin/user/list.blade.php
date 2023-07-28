@extends('admin.layout.master')

@section('title')
User - List
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">User <small>List</small></h1>
            </div>

            @include('admin.notification')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="odd" align="center">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->is_admin ? 'Admin' : 'User'}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                href="{{route('admin.user.delete', [$user->id])}}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="{{route('admin.user.edit', [$user->id])}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>
@endsection
