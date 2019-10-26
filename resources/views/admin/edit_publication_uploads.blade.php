@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div style="width: 70%; margin-left: 3%;">

<form action="{{ url('update_publications_uploads') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <input type="hidden" name="id" value="{{ $data[0]->id }}">



    <label>File Title:</label>
    <input type="text" class="form-control" name="file_title" required="required" value="{{ $data[0]->file_title }}" ><br>

    <label>Sub Sector:</label>
    <select name="publication_id" class="form-control">
        @foreach($publications as $publication)
        <option value="{{ $publication->id }}" {{ $publication->id == $data[0]->publication_id ? "selected" : "" }}>{{ $publication->name }}</option>
<!--        <option value="{{ $publication->id }}"> {{ $publication->name }} </option>-->
        @endforeach
    </select><br>

    <label>Select File:</label>
    <input type="hidden" name="old_image" value="{{ $data[0]->file_name }}">
    <input type="file" name="image" class="form-control"><br>


    <label>Select File Cover Pic:</label><br>
    <img style="width: 150px; width: 150px;" src="{{ url('public/uploads/publications/') }}/{{ $data[0]->file_cover_pic }}">
    <input type="hidden" name="old_cover" value="{{ $data[0]->file_cover_pic }}">
    <input type="file" name="cover" class="form-control" ><br>

<!--    <label>Upload Date</label>-->
<!--    <input type="date" class="form-control" name="upload_date" value="{{ $data[0]->created_at }}"><br>-->

    <label>period</label>
    <select class="form-control" name="period">
        @foreach($years as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select><br>

    <label>Type</label>
    <select class="form-control" name="type">
        <option value="yearly" {{ 'yearly' == $data[0]->type ? "selected" : "" }}>Yearly</option>
        <option value="Monthly" {{ 'Monthly' == $data[0]->type ? "selected" : "" }}>Monthly</option>

    </select><br>



    <br>

    <input type="submit" class="btn btn-primary">
</form>
</div>
@endsection