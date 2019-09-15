@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="modal fade" id="addaboutus" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('about_us') }}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


                    <label>Description</label>
                    <textarea class="form-control" name="description">

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


<div class="modal fade" id="addaboutus_section" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter Section Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('about_us_section') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required="required">

                    <label>Pic</label>
                    <input type="file" name="pic" class="form-control">




                    <label>Description</label>
                    <textarea class="form-control summernote" name="description">

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

<div class="modal fade" id="editaboutus" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter  Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('editaboutus') }}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="id" id="id">


                    <label>Description</label>
                    <textarea class="form-control" id="description" name="description" style="height: 200px;">

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

<div class="modal fade" id="editaboutus_section" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Edit Section Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('editaboutus_section') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="section_id" id="section_id">


                    <label>Title</label>
                    <input type="text" id="section_title" name="title" class="form-control" required="required">

                    <label>Pic</label>
                    <input type="file" name="pic" id="section_pic" class="form-control">
                    <div id="section_image">

                    </div>





                    <label>Description</label>
                    <textarea class="form-control summernote" id="section_description" name="description">

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
            <div class="box-header with-border">
                <h3 class="box-title">About Us</h3>
                @if(count($about_us)>0)
                @else
                <button class=" btn btn-primary btn-sm"  data-toggle="modal" data-target="#addaboutus" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add About Us</button>

                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>

                        <th>Description</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($about_us as $about)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $about->description }}</td>
                        <td>
                            <div class="col-md-2">
                                <button class="edit btn btn-primary btn-sm" value="{{ $about->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-2" style="margin-left: 13px;">
                                <form action="{{ url('about_us',$about->id) }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure to want to delete this?');" name="add_btn" value="Delete" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>Delete</button>

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



<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Section</h3>
                <button class=" btn btn-primary btn-sm"  data-toggle="modal" data-target="#addaboutus_section" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add New Section</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>

                        <th>Description</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($about_us_sections as $about_us_section)
                    <tr>
                        <td>{{ $count }}</td>
                        <td> {!! $about_us_section->description !!}</td>
                        <td>
                            <div class="col-md-2">
                                <button class="section_edit btn btn-primary btn-sm" value="{{ $about_us_section->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-2" style="margin-left: 13px;">
                                <form action="{{ url('about_us_section',$about_us_section->id) }}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure to want to delete this?');" name="add_btn" value="Delete" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>Delete</button>

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
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            focus: true
        });


    });
</script>

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>


<script>
    $(document).ready(function(){
        $('.edit').on('click',function(){

            var id=$(this).val();

            $.get('{{ url("about_us") }}/'+id+'/edit',function(response){
                $.each(response,function(key,value){
                    var id=value.id;
                    $('#id').val(id);
                    $('#description').text(value.description)
                });

                $('#editaboutus').modal('show');
            });
        });


        $('.section_edit').on('click',function(){

            var id=$(this).val();


            $.get('{{ url("about_us_section") }}/'+id+'/edit',function(response){
                $.each(response,function(key,value){
                    var id=value.id;
                    $('#section_id').val(id);
                    $('#section_title').val(value.title);
                    $('#section_image').append('<img style="width: 150px; height: 150px;" src="public/uploads/about_us_section'+'/'+ value.pic +'">');
                    $('#section_description').summernote("code", value.description);

                });
                console.log(response);
//                $("#content").summernote("code", value.page_content);
                $('#editaboutus_section').modal('show');
            });
        });


    });
</script>



@endsection