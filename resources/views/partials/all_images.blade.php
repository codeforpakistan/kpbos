@extends('includes.head')
@section('middle')
<?php  $count=1; ?>

<div style="margin-left: 2%; margin-right: 2%; min-height: 500px;">

    <h1 align="center"  style="margin-top: 2%;">Images</h1>

    <div class="container">
        <div class="row">
            @foreach($images as $image)

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <img style="width: 200px; height: 200px;" src="{{ URL::asset('public/uploads/media/') }}/{{ $image->file_name }}"><br>
<!--                    <span style="font-weight: bold; margin-left: 20%; font-size: 18px;" align="center">{{ $image->event_name }}</span>-->
                </div>

            @endforeach

        </div>
    </div>

</div>


@endsection