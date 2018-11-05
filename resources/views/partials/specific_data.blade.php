@extends('includes.head')
<style>
    .label[data-format=csv], .label[data-format*=csv] {
        background-color: #dfb100;
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
<h1 align="center" style="font-size: 35px;">Department: {{ $sub_category }} (<a href="{{ url('public/uploads/sectors/') }}/{{$filename}}" class="btn btn-sm"  style="height: 40px; width: 50" download ><i class="fa fa-download"></i> Download File</a>)</h1>


<div class="container">
    <div class="row">

        <?php $result2 = $response_data->result;
        $count=0;
        foreach ($result2->results as $key => $value){
            $count=$count+1;
        }
        ?>
        <h1 align="center" style="font-size: 35px;">{{ $count }} Results Found</h1>
        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
            <?php

            $result2 = $response_data->result;
            foreach ($result2->results as $key => $value){
                ?> <h4 style=" text-transform: capitalize;">{{$value->title}}</h4>
                <p>{{$value->notes}}</p>
                <?php
                foreach ($value->resources as $key2 => $value2) {
                    ?>

                    @if($value2->format=='XLSX')
                    <span style="font-size: 20px"><a href="{{ $value2->url }}" class="label" data-format="XLSX">Xls</a></span>
                    @elseif($value2->format=='DOCX')
                    <span style="font-size: 20px"><a href="{{ $value2->url }}" class="label" data-format="DOCX">DOCX</a></span>
                    @elseif($value2->format=='PDF')
                    <span style="font-size: 20px"><a href="{{ $value2->url }}" class="label" data-format="PDF">PDF</a></span>
                    @elseif($value2->format=='ODS')
                    <span style="font-size: 20px"><a href="{{ $value2->url }}" class="label" data-format="DOCX">ODS</a></span>
                    @endif


                <?php
                }
                ?>  <hr><?php
            }
            ?>
        </div>
    </div>

    @endsection()