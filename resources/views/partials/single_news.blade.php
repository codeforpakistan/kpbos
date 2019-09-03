@extends('includes.head')
@section('middle')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<div class="container">
<div style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
<h1 align="center">News And Event</h1>
@foreach($news as $new)
<div class="card" style="padding: 3%;">
<span style="font-size: 25px; font-weight: bold"></span><span style="color: green; font-size: 25px; font-weight: bold"> {{ $new->title }}</span><br>
<p style="font-size: 18px; font-weight: bold"></p><p style="font-size: 15px"> {{ $new->description }} </p>

    @endforeach

{!! $page_content !!}
</div>
</div>
</div>
@endsection