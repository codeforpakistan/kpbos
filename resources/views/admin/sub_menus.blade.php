@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="modal fade" id="addsubmenu" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter Sub Page Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('submenus') }}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


                    <label>Main Page</label>
                    <select name="menu_id" class="form-control">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}"> {{ $menu->name }}</option>
                        @endforeach
                    </select>


                    <label>Sub Page Name:</label>
                    <input type="text" class="form-control" name="name" required="required" ><br>


                    <label>Page Content:</label>
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


<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">

                <p class="modal-title" style="color: #000000"><b>Edit Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('editsubmenus') }}" method="post" id="editform">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id" id="id">

                    <label>Sub Page Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required="required" ><br>


                    <label>Page Content</label>
                    <textarea id="content" name="page_content" class="summernote"></textarea>



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
                <h3 class="box-title">Sub Pages</h3>
                <button class=" btn btn-primary btn-sm"  data-toggle="modal" data-target="#addsubmenu" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add sub Pages</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>

                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($submenus as $submenu)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $submenu->name }}</td>
                        <td>
                            <div class="col-md-2">
                                <button class="edit btn btn-primary btn-sm" value="{{ $submenu->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-2" style="margin-left: 13px;">
                                <form action="{{ url('submenus',$submenu->id) }}" method="post">
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

            $.get('{{ url("submenus") }}/'+id+'/edit',function(response){
                $.each(response,function(key,value){
                    $('#name').val(value.name);
                    var id=value.id;
                    $('#id').val(id);
                    $("#content").summernote("code", value.page_content);
                });

                $('#editmodal').modal('show');
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

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

@endsection