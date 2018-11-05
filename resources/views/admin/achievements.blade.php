@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="modal fade" id="add_achievement" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">

                <p class="modal-title" style="color: #000000"><b>Enter Achievement Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('achievements') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                    <label>Description:</label>
                    <textarea class="form-control" name="description" required="required" style="height: 200px;"></textarea>


                    <label>Picture:</label>
                    <input type="file" class="form-control" name="pic" required="required" ><br>


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



<div class="modal fade" id="edit_achievement" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter News Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('edit_achievements') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="id" id="id">

                    <label>Designation:</label>
                    <textarea name="description" id="description" class="form-control" style="height: 200px"></textarea>

                    <div id="section_image">

                    </div>

                    <label>Picture:</label>
                    <input type="file" class="form-control" name="pic" ><br>

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
                <button type="sm-button" class="btn btn-primary " data-toggle="modal" data-target="#add_achievement" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add New Achievement</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Description</th>
                        <th>Pic</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($achievements as $achievement)
                    <tr>
                        <td>{{ $count }}</td>

                        <td>{{ $achievement->description }}</td>

                        <td><img src="public/uploads/achievements/{{ $achievement->pic }}" style="width: 100px; height: 100px;"></td>

                        <td>
                            <div class="col-md-1">
                                <button class="edit btn btn-primary btn-sm" value="{{ $achievement->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-1" style="margin-left: 13px;">
                                <form action="{{ url('achievements',$achievement->id) }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="add_btn" value="Delete" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>Delete</button>

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
//            alert(id);


            $.get('{{ url("achievements") }}/'+id+'/edit',function(response){
                $('#section_image').empty();
                $.each(response,function(key,value){
                    $('#id').val(value.id);
                    $('#description').text(value.description);
                    $('#section_image').append('<img style="width: 150px; height: 150px;" src="public/uploads/achievements'+'/'+ value.pic +'">');

                });

                $('#edit_achievement').modal('show');
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