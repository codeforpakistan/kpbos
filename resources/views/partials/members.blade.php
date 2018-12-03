@extends('includes.head')
@section('middle')


<!--    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" href="" rel="stylesheet">-->

<!-- Page Content -->
<div class="container">

    <!-- Introduction Row -->
    <h1 align="center" style="padding:5%;">Organization Hierarchy

    </h1>


    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <!--            <h2 class="my-4">Our Team</h2>-->
        </div>
        @foreach($members as $member)

        <div class="col-lg-4 col-sm-6" style="margin-top:5%;  text-align:center !important"  >
            <img class="" style="height: 100px; width: 100px; border-radius: 100px;" src="public/uploads/members/{{ $member->pic }}" alt="">

            <h3 style="margin-top: 10px;"> {{ $member->name }}

            </h3>
            <h5>{{ $member->designation }}</h5>
            <h5>Contact Info: {{ $member->contact_no }}</h5>
            <br>

        </div>
        <br>
        @endforeach

    </div>

</div>
<!-- /.container -->

@endsection