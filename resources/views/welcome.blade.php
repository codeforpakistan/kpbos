@extends('includes.head_new')
@section('middle')
<style>
    .zoom:hover h5{
        font-size: 21px;
        color: #008000 !important;
        -ms-transform: scale(1.02); /* IE 9 */
        -webkit-transform: scale(1.02); /* Safari 3-8 */
        transform: scale(1.02);



    }

    @import url(https://fonts.googleapis.com/css?family=Open+Sans);


    .search {
        width: 100%;
        position: relative
    }

    .searchTerm {
        float: left;
        width: 100%;
        border: 3px solid #00B4CC;
        padding: 5px;
        height: 20px;
        border-radius: 5px;
        outline: none;
        color: #9DBFAF;
    }

    .searchTerm:focus{
        color: #00B4CC;
    }

    .searchButton {
        position: absolute;

        width: 40px;
        height: 36px;
        border: 1px solid #00B4CC;
        background: #00B4CC;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap{
        width: 70%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    @media (max-width: 768px) {
        .btn {
            font-size:11px;

        }
    }

    @media (min-width: 768px) {
        .btn {
            font-size:12px;

        }
    }

    @media (min-width: 992px) {
        .btn {
            font-size:14px;
            padding:0px 0px;
        }
    }

    @media (min-width: 1200px) {
        .btn {
            padding:0px 0px;
            font-size:18px;
        }
    }

</style>


<!-- Header -->


<!-- Banner -->

<!-- Main Contetn -->
<main>


<!--<div class="row">-->
<!--    <div class="main-heading" align="center" style="margin-top: 20px;">-->
<!---->
<!--        <h2>Messages</h2>-->
<!--        <p>Bureau of Statistics is a provincial statistical organization and an attached department of Planning & Development Department mandated to collect, compile, analyze and disseminate official statistics relating to economic, social, demographic and other important dimensions </p>-->
<!--    </div>-->
<!--    <div class="row text-center">-->
<!--        <div class="col-sm-4 col-md-4">-->
<!--            <div class="thumbnail">-->
<!--                <img style="width: 350px; height: 350px" src="assets/images/banner/layer-1.png" alt="Paris">-->
<!--                <p><strong>Paris</strong></p>-->
<!--                <p style="margin-left: 10px;">Mr. Shahram Khan Tarakai Considering health as the basic right of the common man, I believe that health is vital to democracy. I recognize Health as a key factor for development in the democratic context.</p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-sm-4 col-md-4">-->
<!--            <div class="thumbnail">-->
<!--                <img style="width: 350px; height: 350px" src="assets/images/banner/bilawal.jpg" alt="Paris">-->
<!--                <p><strong>Bilawal Bin Khalid</strong></p>-->
<!--                <p style="margin-left: 10px;">Mr. Shahram Khan Tarakai Considering health as the basic right of the common man, I believe that health is vital to democracy. I recognize Health as a key factor for development in the democratic context.</p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-sm-4 col-md-4">-->
<!--            <div class="thumbnail">-->
<!--                <img style="width: 350px; height: 350px" src="assets/images/banner/layer-1.png" alt="Paris">-->
<!--                <p><strong>Paris</strong></p>-->
<!--                <p style="margin-left: 10px;">Mr. Shahram Khan Tarakai Considering health as the basic right of the common man, I believe that health is vital to democracy. I recognize Health as a key factor for development in the democratic context.</p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->




<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width: 1000px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #3c8a50;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4  align="center" style="color: white;" class="modal-title" ><span id="title">Agriculture</span></h4>

                </div>
                <br>
                <div style="margin-left: 6%;"><span  style="text-align: left; " id="sector_description"></span></div>
                <div class="modal-body">
                    <ul id="sectors"  style="font-weight: bold; margin-top: 1em;margin-bottom: 1em; margin-left: 0;margin-right: 0;padding-left: 40px; font-size: 16px;">
                        <li type="circle">Animal husbandry</li>
                        <li type="circle">Co-operative societies</li>
                        <li type="circle">Crop Acreage</li>
                        <li type="circle">Fertilizer</li>
                        <li type="circle">Food</li>
                        <li type="circle">Input</li>
                        <li type="circle">Land Use</li>
                        <li type="circle">Machinery</li>
                        <li type="circle">Metrology</li>
                        <li type="circle">Soil Conservation</li>

                    </ul>
                </div>

            </div>

        </div>
    </div>

</div>

<!--Department Section-->
<section class="quick-links tc-padding white-bg">
    <div class="container" style="width: 80%;">
        <div class="row">
            <div class="main-heading" align="center">

                <h2>Sectors</h2>
                <p>Bureau of Statistics is a provincial statistical organization and an attached department of Planning & Development Department mandated to collect, compile, analyze and disseminate official statistics relating to economic, social, demographic and other important dimensions </p>
            </div>



            <div class="row">
              <div class="col-md-12">
                  @foreach($categories as $category)
                  <div style="cursor: pointer;" onclick="sectors({{$category->id}});"  class="zoom category_id col-sm-3 col-xs-6 xs-full-width">
                      <div class="quick-links-figure">
                          <img style="opacity: 0.5" src="{{ URL::asset('public/uploads/sectors/'.$category->bg_pic) }}" alt="">

                          <div class="overlay">
                              <div class="position-center-x">
                                  <h5>{{ $category->name }}</h5>
                                  <h5  style="font-size: 12px;">(click for sub categories)</h5>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
            </div>

        </div>
    </div>
</section>
<!-- Quick Links -->


<!-- Publications -->
<section class="tc-padding" style="background-color: #3c8a50;">
    <div class="container" style="width: 80%;">

        <!-- Main Heading -->
        <div class="main-heading-holder">
            <div class="main-heading">

                <h2 style="color: white">Yearly Publications</h2>
                <p style="color: white">Bureau of Statistics is a provincial statistical organization and an attached department of Planning & Development Department mandated to collect, compile, analyze and disseminate official statistics relating to economic, social, demographic and other important dimensions </p>
            </div>
        </div>
        <!-- Main Heading -->

        <!-- Services -->
        <div class="row">
            <div class="services-columns">
                <!-- column -->
                @foreach($yearly_publications as $publication)
                <div class="col-sm-3 col-xs-6 xs-full-width">
                    <div class="services-column">
                        <div class="services-icon">
                            <a href="public/uploads/publications/{{ $publication->file_name }}" download> <img style="width: 150px; height: 200px;" class="img img-rounded" src="public/uploads/publications/{{ $publication->file_cover_pic }}" alt="">
                            </a>
                        </div>
                        <h5 style="color: white">Book on Statistics</h5>
                    </div>
                </div>

                @endforeach



                <!-- Servics column -->
            </div>
        </div>
        <!-- Services -->

    </div>
</section>
<!-- End of regular publications section -->


<!-- Publications -->
<section class="tc-padding">
    <div class="container" style="width: 80%;">

        <!-- Main Heading -->
        <div class="main-heading-holder">
            <div class="main-heading">

                <h2>Monthly Publications</h2>
                <p>Bureau of Statistics is a provincial statistical organization and an attached department of Planning & Development Department mandated to collect, compile, analyze and disseminate official statistics relating to economic, social, demographic and other important dimensions </p>
            </div>
        </div>
        <!-- Main Heading -->

        <!-- Services -->

        <div class="row">
            <div class="services-columns">
                <!-- column -->
                @foreach($monthly_publications as $publication)
                <div class="col-sm-3 col-xs-6 xs-full-width">
                    <div class="services-column">
                        <div class="services-icon">
                            <a href="public/uploads/publications/{{ $publication->file_name }}" download> <img style="width: 150px; height: 200px;" class="img img-rounded" src="public/uploads/publications/{{ $publication->file_cover_pic }}" alt="">
                            </a>
                        </div>
                        <h5>Book on Statistics</h5>
                    </div>
                </div>

                @endforeach

                <!--  column -->

            </div>
        </div>
        <!-- Services -->

    </div>
</section>

</main>

<!-- Main Contetn -->
@endsection
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function sectors(id){
        $.get('getsubcategories/'+id,function(response){
           var $el=$('#sectors');
            $el.empty();
            var cat_name='';
            var description='';
            $.each(response,function(key,value){
                console.log(response);
                if(value.name==null){

                }
                else{
                    $el.append('<a href="{{ url('department') }}/'+value.id+ '"> <li ><i class="glyphicon glyphicon-download" style="color: #008000"></i>  '+value.name+'</li>')

                }
               cat_name=value.cat_name;
               description=value.description;
            });

            $('#sector_description').text(description);
            $('#title').text(cat_name);
            $('#myModal').modal('show');
        });
    }
</script>

<!-- Mirrored from techlinqs.com/html/politics/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jul 2018 10:43:04 GMT -->
</html>