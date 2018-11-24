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

    <h1 align="center"  style="margin-top: 2%;">Images</h1>
    
     <div class="container">
         <div class="row">
             @foreach($images as $image)
             <a href="{{ url('all_images') }}/{{ $image->id }}">
             <div class="col-md-3 zoom" >
                 <img style="width: 100%; height: 200px;" src="{{ URL::asset('public/uploads/media/') }}/{{ $image->file_name }}"><br>
                 <div style="font-weight: bold;  font-size: 18px; text-transform:uppercase" align="center">{{ $image->event_name }}</div>
<!--                 <span style="font-weight: bold; margin-left: 20%; font-size: 18px; text-transform:uppercase" align="center">{{ $image->event_name }}</span>-->
             </div>
             </a>
             @endforeach
             
         </div>
     </div>

</div>


@endsection