@extends('includes.adminhead')
@section('middle')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="modal fade" id="addsubcategory" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Enter Department Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('subcategories') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                    <label>Sector Name:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label>Department Name</label>
                    <input type="text" name="name" class="form-control" required="required">

                    <label>Detail File of Sector</label>
                    <input type="file" name="file" class="form-control">



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

<div class="modal fade" id="editsubcategory" role="dialog">
    <div class="modal-dialog">

        <!--  task Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#33bcb8; color: #000000;">
                <p class="modal-title" style="color: #000000"><b>Edit Department Detail Below</b></p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('editsubcategory') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="id" id="id">

                    <label>Sector Name:</label>

                    <select name="category_id" id="editcategory_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label>Department Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required="required"><br>

                    <label>File Name</label>
                    <span  style="font-size: 18px;" id="filename"></span>

                    <input type="file" name="file" class="form-control">



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
                <h3 class="box-title">Departments</h3>
                <button class=" btn btn-primary btn-sm"  data-toggle="modal" data-target="#addsubcategory" style="margin-left: 25em; float: right; height: 30px;"><i class="fa fa-plus fa-fw"></i>Add Department</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" style="border: 1px solid #000000;">
                    <?php $count=1; ?>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Sector Name</th>
                        <th>Category Name</th>
                        <th>File</th>
                        <th style="width: 40%">Action</th>
                    </tr>
                    @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->cat_name }}</td>
                        <td>         <a style="color: #008000; font-weight: bold" href="{{ url('public/uploads/sectors/'.$subcategory->file_name) }}" download ><button  class="btn btn-primary btn-sm"><i class="fa fa-download"></i>Download</button></a></td>
                        <td>
                            <div class="col-md-1">
                                <button class="edit btn btn-primary btn-sm" value="{{ $subcategory->id }}"><i class="glyphicon glyphicon-pencil"></i>Edit</button>
                            </div>
                            <div class="col-md-1" style="margin-left: 13px;">
                                <form action="{{ url('subcategories',$subcategory->id) }}" method="post">
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
            $.get('{{ url("subcategories") }}/'+id+'/edit',function(response){
                $.each(response,function(key,value){
                    var name=value.name;
                    $('#id').val(value.id);
                    $('#name').val(value.name);
                    $('#editcategory_id').val(value.category_id).change();
                    $('#filename').text(value.file_name)

                });
                $('#editsubcategory').modal('show');
            });
        });
    });
</script>
@endsection