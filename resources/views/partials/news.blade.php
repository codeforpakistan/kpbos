@extends('includes.head')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
@section('middle')

<style>
    .zoom:hover {
        -ms-transform: scale(1.03); /* IE 9 */
        -webkit-transform: scale(1.03); /* Safari 3-8 */
        transform: scale(1.03);
    }

</style>
<?php  $count=1; ?>
<div class="container">
    <div  style="margin-left: 2%; margin-right: 2%">

        <h1 align="center"  style="margin-top: 2%;">News And Event</h1>
        @foreach($news as $new)

        <div class="zoom card" style="margin-top: 3%; padding: 3%;">
            <h3>{{ $new->title }} </h3>
            <p style="font-weight: bold"></p><p> {{ $new->description }}</p>
            <a href="{{ url('singlenews') }}/{{ $new->id }}"><button class="btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Read More</button></a>
            <?php $count=$count+1; ?>
        </div>
        @endforeach
    </div>

</div>




@endsection