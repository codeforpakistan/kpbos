@extends('includes.head')
@section('middle')
<style>
    .zoom:hover {
        -ms-transform: scale(1.1); /* IE 9 */
        -webkit-transform: scale(1.1); /* Safari 3-8 */
        transform: scale(1.1);
    }

</style>
<?php  $count=1; ?>

<div style="margin-left: 2%; margin-right: 2%; min-height: 500px;">

    <h1 align="center"  style="margin-top: 2%;">Videos</h1>

    <div class="container">
        <div class="row">
            @foreach($videos as $video)
            <a href="{{ url('all_videos') }}/{{ $video->id }}">
                <div class="col-md-3 zoom" >
                    <video class="video" width="400" height="240" >
                        <source  src="{{ asset("public/uploads/media/{$video->file_name }") }}"  type="video/mp4">
                    </video>
                    <br>
                    <span style="font-weight: bold; margin-left: 50%; font-size: 18px; text-transform:uppercase" align="center">{{ $video->event_name }}</span>
                </div>
            </a>
            @endforeach

        </div>
    </div>

</div>


@endsection