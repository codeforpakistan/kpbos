@extends('includes.head')
@section('middle')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<div class="container">
    <div>
        <div style="margin-left: 2%;margin-top: 3%; margin-right: 3%">
            {!! $page_content !!}
        </div>
    </div>
</div>



@endsection