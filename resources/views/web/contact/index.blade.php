@extends('web.layout.master')

@section('content')
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">

                        @if(session('success'))
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif

                        @if (count($errors))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                        </div>
                        @endif

                        <div class="col-lg-5">
                            <h4>Who we are</h4>
                            <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion
                                styles from independent creatives around the world.</p>

                            <h4>How we help?</h4>
                            <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in
                                sollicitudin ligula congue quis turpis dui urna nibhs. </p>

                            <h4>Pre-Sale Question</h4>
                            <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque
                                blandit hendrerit placerat. Integertis non.</p>
                        </div>

                        <div class="col-lg-7">
                            <form class="form-wrapper" action="{{ route('send-contact') }}" method="POST">
                                @csrf
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name: " />
                                <input type="text" name="address" class="form-control"
                                    placeholder="Enter Your Address" />
                                <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone" />
                                <input type="text" name="subject" class="form-control"
                                    placeholder="Enter Your Subject" />
                                <textarea class="form-control" name="message"
                                    placeholder="Enter Your Message"></textarea>
                                <button type="submit" class="btn btn-primary">Gửi <i
                                        class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
