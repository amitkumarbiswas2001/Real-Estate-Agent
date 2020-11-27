@extends('layouts.website', ['site_title' => "About Us"])


@section('content')

    <section class="w3l-about-breadcrum">
        <div class="breadcrum-bg py-sm-5 py-4">
            <div class="container py-lg-3">

            <h2>About Us</h2>
            <p><a href="{{ route('website.home') }}">Home</a> &nbsp; / &nbsp; About</p>

            </div>
        </div>
    </section>
    <section class="w3l-content-with-photo-4" id="about">
        <div id="content-with-photo4-block" class="py-5">
            <div class="container py-md-3">
                <div class="cwp4-two row">

                    <div class="cwp4-text col-lg-6">
                            <h3>Company Overview</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                        Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                        </p>
                        <ul class="cont-4">
                            <li><span class="mr-3 fa fa-long-arrow-right"></span>Insurgent Mindset</li>
                            <li><span class="mr-3 fa fa-long-arrow-right"></span>Enduring Results </li>
                            <li><span class="mr-3 fa fa-long-arrow-right"></span>Passionate People</li>

                        </ul>

                    </div>
                    <div class="cwp4-image col-lg-6 pl-lg-5 mt-lg-0 mt-5">
                        <img src="assets/images/g4.jpg" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
