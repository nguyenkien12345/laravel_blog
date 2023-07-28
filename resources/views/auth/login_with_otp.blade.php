@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post-login-with-otp') }}">
                            @csrf

                            <div class="form-group row mobile">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control" name="mobile" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row otp">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">OTP</label>

                                <div class="col-md-6">
                                    <input id="otp" type="number" class="form-control" name="otp" >
                                </div>
                            </div>

                            <div class="form-group row mb-0 otp">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>

                        <div class="form-group row send-otp">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success" onclick="sendOtp()">Send OTP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.otp').hide();
        function sendOtp() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'send-otp',
                type:'post',
                data: {'mobile': $('#mobile').val()},
                success:function(data) {
                    alert(data);
                    if(data != 0){
                        $('.otp').show();
                        $('.send-otp').hide();
                    }else{
                        alert('Mobile No not found');
                    }
                },
                error:function (error) {
                    console.log('error: ', error);
                }
            });
        }
    </script>
@endsection
