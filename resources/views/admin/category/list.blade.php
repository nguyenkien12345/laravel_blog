@extends('admin.layout.master')

@section('title')
Category - List
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">


        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Category - <small>List</small></h1>
            </div>

            @include('admin.notification')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr align="center">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                href="{{route('admin.category.edit',[$category->id])}}">Edit</a></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                href="{{route('admin.category.delete', [$category->id])}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>
@endsection
