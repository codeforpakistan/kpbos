@extends('includes.head')

@section('middle')

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .zoom:hover {
        -ms-transform: scale(1.1); /* IE 9 */
        -webkit-transform: scale(1.1); /* Safari 3-8 */
        transform: scale(1.1);
    }

    .khan {
        position: relative;

    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        /*background-color: rgba(151, 151, 151, 1);*/
        background-color: #008CBA;
    }

    .khan:hover .overlay {
        opacity: 1;
        transition: .05s ease;
    }

    .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

</style>



<div style="margin-left: 2%; margin-right: 2%;min-height: 500px;">
<h1 class="box-title" align="center" style="margin-top: 2%; ">Publications</h1>
    @if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}" id="id">
    @endif

    <select id="period" style="width: 20%; color: #000000;float: right" class="form-control" name="period">
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



    <!-- Publications -->
    <section class="tc-padding ">
        <div class="container">

            <!-- Main Heading -->
            <div class="main-heading-holder">

            </div>
            <!-- Main Heading -->

            <!-- Services -->

            <div class="row">
                <div class="services-columns">
                    <!-- column -->
                    <?php $count=1; ?>
                    @foreach($allpublications  as $publication)
                    <div class="col-sm-3 col-xs-6 xs-full-width khan">
                        <div class="services-column zoom">
                            <div class="services-icon">
                                <a href="public/uploads/uplications/{{ $publication->file_name }}" download>
                                    @if($publication->file_cover_pic=="")
                                    <img style="width: 150px; height: 200px;" class="image img img-rounded" src="{{ URL::asset('public/uploads/publications/DS KP.jpg') }}" src="" alt="">
                                    @else
                                    <img style="width: 150px; height: 200px;" class="image img img-rounded" src="{{ URL::asset('public/uploads/publications/'.$publication->file_cover_pic) }}"  alt="">
                                    @endif
                                </a>
                            </div>
                            <h5>{{ $count }}.{{ $publication->file_title }}</h5>
                            <h4>   <a style="color: #008000; font-weight: bold" href="{{ url('public/uploads/publications/'.$publication->file_name) }}" download ><i class="fa fa-download fa-fw"></i>Download</a>
                            </h4>
                            <h5> <form  action="{{ url('search') }}" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="keyword" value="{{ $publication->file_title}}" style=" color: #000000;" class="form-control" type="text" placeholder="Search your desired dataset">

                                    <input type="submit" value="datasets" style="height: 37px; line-height: 37px; width: 40%;" class="btn btn-primary btn-sm">
                                </form>

                            </h5>

                            <div class="overlay">
                                <div style="margin-top: 130px;">
                                <h4>   <a style="color: #008000; font-weight: bold" href="{{ url('public/uploads/publications/'.$publication->file_name) }}" download ><i class="fa fa-download fa-fw"></i>Download</a>
                                </h4>
                                <h5> <form  action="{{ url('search') }}" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="keyword" value="{{ $publication->file_title}}" style=" color: #000000;" class="form-control" type="text" placeholder="Search your desired dataset">

                                        <input type="submit" value="datasets" style="height: 37px; line-height: 37px; width: 40%;" class="btn btn-primary btn-sm">
                                    </form>

                                </h5>
                                    </div>
                            </div>

                        </div>
                    </div>
                    <?php $count=$count+1; ?>
                    @endforeach


                    <!--  column -->

                </div>
            </div>
            <div align="center">
            {{ $allpublications->render() }}
            </div>
            <!-- Services -->

        </div>
    </section>

</div>


<script>
    $(document).ready(function(){
       $('#period').on('change',function(){
         var period= $(this).val();

          @if(isset($id))
               window.location="{{ url('publicationbydate') }}"+'/'+period + '/' + {{ $id }};
           @else
           window.location="{{ url('publicationbydate') }}"+'/'+period;
           @endif


//           window.location="{{ url('publicationbydate') }}"+'/'+period;
       });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

@endsection

