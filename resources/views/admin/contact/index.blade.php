@extends('admin.layout.master')

@section('title')
Contact - List
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">


        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Contact - <small>List</small></h1>
            </div>

            @include('admin.notification')

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr align="center">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                href="{{route('admin.contact.delete', [$contact->id])}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>
@endsection
