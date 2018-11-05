@extends('includes.head')
@section('middle')
<style>
    .zoom:hover {
        -ms-transform: scale(1.03); /* IE 9 */
        -webkit-transform: scale(1.03); /* Safari 3-8 */
        transform: scale(1.03);
    }

</style>
<div class="container" style="min-height: 400px; margin-left: 2%; margin-right: 2%;">
<h3 align="center" style="margin-top: 3%;">Achievements</h3>
@foreach($achievements as $achievement)
<div class="col-md-12 zoom" style="margin-top: 2%; margin-bottom: 2%;padding: 8px; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px black">
    <div class="col-md-8" style="margin-top: 20px;">
       <p>
       {{ $achievement->description }}
       </p>
    </div>
    <div class="col-md-4">
         <img style="margin-left:30px;width: 300px; height: 200px;" src="public/uploads/achievements/{{ $achievement->pic }}">
    </div>
</div>
@endforeach
</div>
@endsection