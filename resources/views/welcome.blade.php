@extends('frontend.layouts.app')

@section('content')

    <section>
        <div class="jumbotron" style="padding-top: 90px;padding-bottom: 40px;margin-bottom: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <h1 style="font-size: 75px;font-style: normal;font-weight: bold;color: rgb(0,0,0);margin-bottom: 2px;">Chidovas&nbsp;</h1>
                        <h2 style="font-size: 45px;font-style: normal;font-weight: normal;color: rgb(91,79,91);">Global Links</h2>
                        <p class="lead">Giant Dealers on Tricycle (Keke na Pepe).</p>
                        <p><a class="btn btn-primary text-dark" role="button" style="background-color: rgb(255,193,7);" href="/login.html">Sign In</a></p>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div><img class="rounded img-fluid" src="{{ asset('frontend_assets/assets/img/tvs_tricycle-removebg-preview.png') }}" width="559"></div>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </section>
    <section id="about">
        <div style="padding-top: 70px;padding-bottom: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div><img class="rounded img-fluid" src="{{ asset('frontend_assets/assets/img/tvs-king-removebg-preview.png') }}" width="336"></div>
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <div>
                            <h1>About Chidovas</h1>
                            <p class="text-justify">Chidovas Global Links is a business name which deals on various kinds of tricycles (Keke na pep) in wholesale and parts. We have our head office in Nnewi in Anambra State. Nigeria.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" style="background-color: rgba(255,193,7,0.19);">
        <div style="padding-top: 70px;padding-bottom: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <div>
                            <h1>Our Services</h1>
                            <p class="text-justify">We ensure that any tricycle from our company is sound and guaranteed before delivery is made to our esteemed customers.</p>
                            <p class="text-justify">Various parts of keke na pepe can be found in our company from any of our branches. We ensure that our numerous customers get value of their money and guarantee given along side.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="text-center"><img class="rounded img-fluid" src="{{ asset('frontend_assets/assets/img/service1.png') }}" width="519"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div style="padding-top: 70px;padding-bottom: 70px;">
            <div class="container">
                <h1 style="margin-bottom: 15px;">Contact Us</h1>
                <div class="row">
                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div>
                            <div>
                                <p><i class="fa fa-phone" style="font-size: 20px;"></i>&nbsp;0803-643-9548<br></p>
                            </div>
                            <div>
                                <p><i class="fa fa-whatsapp" style="font-size: 20px;"></i>&nbsp;0803-643-9548<br></p>
                                <p><i class="fa fa-envelope-o" style="font-size: 20px;"></i>&nbsp; info@chidovas.com<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div>
                            <div>
                                <p class="lead" style="margin-bottom: 2px;">Branches</p>
                                <p style="margin-bottom: 2px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i>&nbsp;Awada, Onitsha. Anambra State.</p>
                                <p style="margin-bottom: 2px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i>&nbsp;Mgbuka Obosi Nnewi. Anambra State.</p>
                                <p style="margin-bottom: 2px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i>&nbsp;Nwodo Street, Enugu. Enugu State.</p>
                                <p style="margin-bottom: 2px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i>&nbsp;Azikiwe road, Aba. Abia State.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

