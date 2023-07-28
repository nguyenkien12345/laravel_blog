@extends('web.layout.master')

@section('content')
<section class="section wb mt-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if(session('error'))
                <div class="alert alert-danger">
                    <p>{{session('error')}}</p>
                </div>
                @endif

                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-wrapper" method="POST" action="{{route('check-login')}}">
                                @csrf
                                <input type="text" class="form-control" name="username"
                                    placeholder="Enter Your Username" />
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter Your Password" />
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection
