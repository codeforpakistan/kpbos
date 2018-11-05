@extends('includes.head')
@section('middle')


<!--    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" href="" rel="stylesheet">-->

<!-- Page Content -->
<div class="container" style="margin-top: 20px;">

    <!-- Introduction Row -->
    <h1 align="center">About Us

    </h1>

        @foreach($about_us as $about)
       <p>
        {{ $about->description }}
       </p>
       @endforeach
    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
<!--            <h2 class="my-4">Our Team</h2>-->
        </div>
        @foreach($about_us_sections as $about_us_section)
        <div class="col-lg-4 col-sm-6" style="text-align:center !important" >
            <img class="" style="border-radius: 100px;" src="public/uploads/about_us_section/{{ $about_us_section->pic }}" alt="">

            <h3 style="margin-top: 10px;"> {{ $about_us_section->title }}

            </h3>
            <p style="text-align: justify">
                {!! $about_us_section->description !!}
            </p>
        </div>
        @endforeach

    </div>

</div>
<!-- /.container -->

@endsection