@extends('includes.head')
@section('middle')
<?php  $count=1; ?>

<div style="margin-left: 2%; margin-right: 2%">

    <h1 align="center"  style="margin-top: 2%;">News And Event</h1>
    @foreach($news as $new)
    <h3>{{ $count }}. Title: {{ $new->title }} </h3>
    <h3>Breif Description:</h3><h5> {{ $new->description }}</h5>
    <a href="{{ url('singlenews') }}/{{ $new->id }}"><button class="btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Read More</button></a>
    <?php $count=$count+1; ?>
    @endforeach
</div>


@endsection