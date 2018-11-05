<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div style="width: 50%; padding: 10px; border: 1px #000000 solid; margin-left: 30%;">

<form method="post" action="{{ url('datasetcreate') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <label>Dataset Name ::</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name for dataset">


    <label>Dataset Title ::</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title for dataset">
     <input type="submit" class="btn btn-primary">

</form>
</div>