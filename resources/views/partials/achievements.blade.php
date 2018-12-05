@extends('includes.head')
@section('middle')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<style>
    .zoom:hover {
        -ms-transform: scale(1.03); /* IE 9 */
        -webkit-transform: scale(1.03); /* Safari 3-8 */
        transform: scale(1.03);
    }

</style>
<div class="container">
<h3 align="center" style="margin-top: 3%;">Achievements</h3>
@foreach($achievements as $achievement)
<div class="col-md-12 zoom" style="margin-bottom: 2%; padding: 1%; border: 1px solid rgba(0,0,0,.125)">
    <div style="padding: 1%;" class="col-md-4">
        <img  style="margin: auto; width: 300px; height: 200px;" src="public/uploads/achievements/{{ $achievement->pic }}">
    </div>
    <div class="col-md-8" style="margin-top: 20px;">
       <p class="card-text" style="text-align: justify">
       {{ $achievement->description }}
       </p>
    </div>

</div>
@endforeach
</div>
@endsection