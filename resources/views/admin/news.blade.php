@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="modal fade" id="addnews" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">

                <p class="modal-title" style="color: #000000"><b>Enter News Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('news') }}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                    <label>News Title:</label>
                    <input type="text" class="form-control" name="title" required="required" ><br>

                    <label>Brief Description:</label>
                    <input type="text" class="form-control" name="description" required="required" ><br>


                    <label>News Content:</label>
                    <textarea name="page_content" class="summernote"></textarea>


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



<div class="modal fade" id="editnews" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter News Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('editnews') }}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="id" id="id">

                    <label>News Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required="required" ><br>

                    <label>Brief Description:</label>
                    <input type="text" class="form-control" id="description" name="description" required="required" ><br>


                    <label>News Content:</label>
                    <textarea name="page_content" id="page_content" class="summernote"></textarea>

                    </textarea>



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
            <div class="box-header with-border" >
                <h3 class="box-title">News</h3>
                <button type="sm-button" class="btn btn-primary " data-toggle="modal" data-target="#addnews" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add News</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Brief Description</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($news as $new)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->description }}</td>
                        <td>
                            <div class="col-md-2">
                                <button class="edit btn btn-primary btn-sm" value="{{ $new->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-2" style="margin-left: 13px;">
                                <form action="{{ url('news',$new->id) }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="add_btn" value="Delete"  onclick="return confirm('Are you sure to want to delete this?');" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>Delete</button>

                                </form>
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




<script>
    $(document).ready(function(){
        $('.edit').on('click',function(){

            var id=$(this).val();

            $.get('{{ url("news") }}/'+id+'/edit',function(response){
                $.each(response,function(key,value){
                    $('#id').val(value.id);
                    $('#title').val(value.title);
                    $('#description').val(value.description);
                    $("#page_content").summernote("code", value.page_content);
                });

                $('#editnews').modal('show');
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            focus: true
        });
    });
</script>
@endsection