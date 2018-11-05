@extends('includes.head')
<style>
    span{
        font-size: 15px;
    }
</style>
@section('middle')

<div class="container">
    <div class="row" style="padding-top: 20px;">
        <div class="col-md-6">
            <h3 class="text-center">Contact Us Directly</h3>
            <p style="font-size: 15px;">Comments and suggestions from esteemed visitors to our website would be welcome and appreciated to provide us the basis to further improve our services.</p>
            <div class="row">
                <div class="col-md-1">
                    <span class="fa fa-map-marker" aria-hidden="true"></span>
                </div>
                <div class="col-md-11">
                    <span>Bureau of Statistics, Ground Floor, Benevolent Fund Building,</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <span class="fa fa-phone" aria-hidden="true"></span>
                </div>
                <div class="col-md-11">
                    <span>+92 91 9211183</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <span class="fa fa-fax" aria-hidden="true"></span>
                </div>
                <div class="col-md-11">
                    <span>+92 91 5261332</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <span class="fa fa-envelope" aria-hidden="true"></span>
                </div>
                <div class="col-md-11">
                    <span>kpkbos@gmail.com</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" action="" method="post">
                    <fieldset>
                       <h4 align="center">Contact Us Through E-mail</h4>

                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Name</label>
                            <div class="col-md-9">
                                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Your E-mail</label>
                            <div class="col-md-9">
                                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Your message</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
