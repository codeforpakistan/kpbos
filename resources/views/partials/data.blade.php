@extends('includes.head')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<style>
    .label[data-format=CSV], .label[data-format*=csv] {
        background-color: #dfb100;
    }
    .label[data-format=JSON], .label[data-format*=json] {
        background-color: orange;
    }
    .label[data-format=XLSX], .label[data-format*=XLSX] {
        background-color: #dfb100;
    }
    .label[data-format=DOCX], .label[data-format*=DOCX], .label[data-format*=nquad], .label[data-format*=ntriples], .label[data-format*=turtle] {
        background-color: #0b4498;
    }
    .label[data-format=PDF], .label[data-format*=PDF] {
        background-color: #0b4498;
    }

</style>
@section('middle')


<div class="container">
    <div class="row">

       <?php $result2 = $response_data->result;
       $count=0;
        foreach ($result2->results as $key => $value){
         $count=$count+1;
        }
       ?>
        <h1 style="width:100%;font-size: 35px;text-align:center; margin:3%;">{{ $count }} Results Found</h1>
        <div class="card" style="margin:0 auto;">
            <?php

            $result2 = $response_data->result;
            foreach ($result2->results as $key => $value){
               ?> <h4 style=" text-transform: capitalize; margin:2%;"><a href="http://13.76.133.211/dataset/{{$value->name}}" target="_blank">{{$value->title}}</a></h4>
                <p style="margin-left:2%">{{$value->notes}}</p>
                <?php
                foreach ($value->resources as $key2 => $value2) {
                     ?>

                     @if($value2->format=='XLSX')
                     <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="XLSX">Xls</a></span>
                     @elseif($value2->format=='DOCX')
                     <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="DOCX">DOCX</a></span>
                    @elseif($value2->format=='PDF')
                    <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="PDF">PDF</a></span>
                    @elseif($value2->format=='CSV')
                    <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="CSV">CSV</a></span>
                    @elseif($value2->format=='JSON')
                    <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="JSON">JSON</a></span>
                    @elseif($value2->format=='ODS')
                    <span style="font-size: 20px;margin-left:2%"><a href="{{ $value2->url }}" class="label" data-format="DOCX">ODS</a></span>
                     @endif


                   <?php
                }
                ?> <?php
            }
            ?>
    </div>
</div>

@endsection()
