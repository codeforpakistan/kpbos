@extends('includes.head')
@section('middle')
<h1 align="center">News And Event</h1>
@foreach($news as $new)
<span style="font-size: 25px; font-weight: bold">Title:</span><span style="color: green; font-size: 25px; font-weight: bold"> {{ $new->title }}</span><br>
<span style="font-size: 25px; font-weight: bold">Description:</span><span style="font-size: 15px"> {{ $new->description }} </span>
@endforeach

{!! $page_content !!}
@endsection