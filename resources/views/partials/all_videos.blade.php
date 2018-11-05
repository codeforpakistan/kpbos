@extends('includes.head')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php  $count=1; ?>

<div style="margin-left: 2%; margin-right: 2%; min-height: 500px;">

    <h1 align="center"  style="margin-top: 2%;">Videos</h1>

    <div class="container">
        <div class="row">
            @foreach($videos as $video)
            <div class="col-md-3 col-xs-6">
                <video class="video" width="400" height="240" >
                    <source  src="{{ asset("public/uploads/media/{$video->file_name }") }}"  type="video/mp4">
                </video>
            </div>
            @endforeach

        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('.video').click(function(){
//            alert('i am clicked');
            this[this.paused ? 'play' : 'pause']();
        });
    });
</script>


@endsection