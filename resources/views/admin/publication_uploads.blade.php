@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="modal fade" id="addpublicationuploads" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Upload File Detail</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('publications_uploads') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">



                    <label>File Title:</label>
                    <input type="text" class="form-control" name="file_title" required="required" ><br>

                    <label>Sub Sector:</label>
                     <select name="publication_id" class="form-control">
                         @foreach($publications as $publication)
                         <option value="{{ $publication->id }}"> {{ $publication->name }} </option>
                         @endforeach
                     </select><br>

                    <label>Select File:</label>
                    <input type="file" name="image" class="form-control" required="required"><br>


                    <label>Select File Cover Pic:</label>
                    <input type="file" name="cover" class="form-control" ><br>

                    <label>Upload Date</label>
                    <input type="date" class="form-control" name="upload_date"><br>

                    <label>period</label>
                    <select class="form-control" name="period">
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </select><br>

                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value="yearly">Yearly</option>
                        <option value="Monthly">Monthly</option>
                     </select><br>



                    <br>

                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer"  style="background-color: #33bcb8; color: #ffffff;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Publications Management</h3>
                <button class=" btn btn-primary btn-sm"  data-toggle="modal" data-target="#addpublicationuploads" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add New File</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>File Title</th>
                        <th>Uploaded Date</th>
                        <th>Upload Type</th>
                        <th>Period</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($uploads as $upload)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $upload->file_title }}</td>
                        <td>{{ $upload->created_at }}</td>
                        <td>{{ $upload->type}}</td>
                        <td>{{ $upload->period }}</td>
                        <td>
                            <div class="col-md-1">
                               <a href="{{ url('publications_uploads') }}/{{$upload->id}}/edit"> <button class="edit btn btn-primary btn-sm" value="{{ $upload->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button></a>
                            </div>
                            <div class="col-md-1" style="margin-left: 13px;">
                                <form action="{{ url('publications_uploads',$upload->id) }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="add_btn" value="Delete" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>Delete</button>

                                </form>
                            </div>
                            <div class="col-md-2" style="margin-left: 30px;">
                                <a style="color: #008000; font-weight: bold" href="{{ url('public/uploads/publications/'.$upload->file_name) }}" download ><button class="btn btn-primary btn-sm"><i class="fa fa-download"></i>Download</button></a>
                            </div>

                            </form>
                        </td>
                    </tr>
                    <?php $count=$count+1; ?>
                    @endforeach

                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection