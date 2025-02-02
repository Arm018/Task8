<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Findeo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


    <!-- Compare Properties Widget
    ================================================== -->
    <div class="compare-slide-menu">

        <div class="csm-trigger"></div>

        <div class="csm-content">
            <h4>Compare Properties
                <div class="csm-mobile-trigger"></div>
            </h4>

            <div class="csm-properties">

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
                        </div>
                        <img src="images/listing-01.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
                        </div>
                        <img src="images/listing-03.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
                        </div>
                        <img src="images/listing-05.jpg" alt="">
                    </a>
                </div>

            </div>

            <div class="csm-buttons">
                <a href="compare-properties.html" class="button">Compare</a>
                <a href="#" class="button reset">Reset</a>
            </div>
        </div>

    </div>
    <!-- Compare Properties Widget / End -->


    <!-- Header Container
    ================================================== -->
    @include('layouts.header2')
    <!-- Header Container / End -->


    <!-- Slider
    ================================================== -->
    <div class="fullwidth-home-slider margin-bottom-0">
        @foreach ($properties as $property)
            @foreach ($property->images->take(1) as $image)
                <div data-background-image="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}" class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="home-slider-container">
                                    <div class="home-slider-desc">
                                        <div class="home-slider-price">
                                            ${{ $property->price }} @if ($property->getStatusName() == 'For Rent')
                                                <i>/ monthly</i>
                                            @endif
                                        </div>
                                        <div class="home-slider-title">
                                            <h3>
                                                <a href="{{ route('single.property', $property->id) }}">{{ $property->title }}</a>
                                            </h3>
                                            <span><i class="fa fa-map-marker"></i> {{ $property->address }}, {{ $property->city }}, {{ $property->state }}</span>
                                        </div>
                                        <a href="{{ route('single.property', $property->id) }}" class="read-more">View
                                            Details <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>


    <!-- Content
    ================================================== -->
    <!-- Featured -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Featured</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">

                    <!-- Listing Item -->
                    @foreach($properties as $property)

                        <div class="carousel-item">
                            <div class="listing-item compact">
                                <a href="{{route('property.show',$property->id)}}" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span>{{$property->getStatusName()}}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span
                                            class="listing-compact-title">{{$property->title}}<i>${{$property->price}}</i></span>

                                        <ul class="listing-hidden-content">
                                            <li>Area <span>{{$property->area}} sq ft</span></li>
                                            <li>Rooms <span>{{$property->rooms}}</span></li>
                                            <li>Beds <span>{{$property->details->bedrooms}}</span></li>
                                            <li>Baths <span>{{$property->details->bathrooms}}</span></li>
                                        </ul>
                                    </div>

                                    @foreach($property->images->take(1) as $image)
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}"
                                             height="300" alt="">
                                    @endforeach
                                </a>

                            </div>
                        </div>
                    @endforeach

                    <!-- Listing Item / End -->
                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>
    <!-- Featured / End -->


    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105 margin-bottom-0 padding-bottom-70 padding-top-100">

        <h3 class="headline-box">Most Popular Places</h3>

        <!-- Container -->
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <!-- Image Box -->
                    <a href="listings-list-with-sidebar.html" class="img-box"
                       data-background-image="images/popular-location-01.jpg">

                        <!-- Badge -->
                        <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div>

                        <div class="img-box-content visible">
                            <h4>New York </h4>
                            <span>14 Properties</span>
                        </div>
                    </a>

                </div>

                <div class="col-md-8">

                    <!-- Image Box -->
                    <a href="listings-list-with-sidebar.html" class="img-box"
                       data-background-image="images/popular-location-02.jpg">
                        <div class="img-box-content visible">
                            <h4>Los Angeles</h4>
                            <span>24 Properties</span>
                        </div>
                    </a>

                </div>

                <div class="col-md-8">

                    <!-- Image Box -->
                    <a href="listings-list-with-sidebar.html" class="img-box"
                       data-background-image="images/popular-location-03.jpg">
                        <div class="img-box-content visible">
                            <h4>San Francisco </h4>
                            <span>12 Properties</span>
                        </div>
                    </a>

                </div>

                <div class="col-md-4">

                    <!-- Image Box -->
                    <a href="listings-list-with-sidebar.html" class="img-box"
                       data-background-image="images/popular-location-04.jpg">
                        <div class="img-box-content visible">
                            <h4>Miami</h4>
                            <span>9 Properties</span>
                        </div>
                    </a>

                </div>

            </div>
        </div>
        <!-- Container / End -->

    </section>
    <!-- Fullwidth Section / End -->


    <!-- Counters Container -->
    <div class="parallax margin-top-0 margin-bottom-40"
         data-background="images/listings-parallax.jpg"
         data-color="#252529"
         data-color-opacity="0.85"
         data-img-width="800"
         data-img-height="505">

        <!-- Counters -->
        <div id="counters">
            <div class="container">

                <div class="row">

                    <div class="counter-boxes-inside-parallax">

                        <div class="col-md-3 col-sm-6">
                            <div class="counter-box">
                                <div class="counter-box-icon">
                                    <i class="im im-icon-Home-2"></i>
                                    <span class="counter">942</span>
                                    <p>Listings For Sale</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="counter-box">
                                <div class="counter-box-icon">
                                    <i class="im im-icon-Money-2"></i>
                                    <span class="counter">1476</span>
                                    <p>Listings For Rent</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="counter-box">
                                <div class="counter-box-icon">
                                    <i class="im im-icon-Business-ManWoman"></i>
                                    <span class="counter">389</span>
                                    <p>Agents</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="counter-box last">
                                <div class="counter-box-icon">
                                    <i class="im im-icon-Suitcase"></i>
                                    <span class="counter">163</span>
                                    <p>Brokers</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- Counters / End -->

        <!-- Flip banner -->
        <a href="listings-half-map-grid-standard.html" class="flip-banner parallax" data-color="#274abb"
           data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
            <div class="flip-banner-content">
                <h2 class="flip-visible">We help people and homes find each other</h2>
                <h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
            </div>
        </a>
        <!-- Flip banner / End -->

    </div>
    <!-- Counters Container / End -->


    <!-- Agents Section -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="headline margin-top-20 margin-bottom-45">Our Agents</h3>
            </div>
        </div>

        <div class="row">
            <!-- Agents Container -->
            <div class="agents-grid-container">

                <!-- Agent -->
                <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="agent">

                        <div class="agent-avatar">
                            <a href="agent-page.html">
                                <img src="/images/agent-01.jpg" alt="">
                                <span class="view-profile-btn">View Profile</span>
                            </a>
                        </div>

                        <div class="agent-content">
                            <div class="agent-name">
                                <h4><a href="agent-page.html">Tom Wilson</a></h4>
                                <span>Agent In New York</span>
                            </div>

                            <ul class="agent-contact-details">
                                <li><i class="sl sl-icon-call-in"></i>(123) 123-456</li>
                                <li><i class="fa fa-envelope-o "></i><a href="#">tom@example.com</a></li>
                            </ul>

                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- Agent / End -->


                <!-- Agent -->
                <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="agent">

                        <div class="agent-avatar">
                            <a href="agent-page.html">
                                <img src="/images/agent-02.jpg" alt="">
                                <span class="view-profile-btn">View Profile</span>
                            </a>
                        </div>

                        <div class="agent-content">
                            <div class="agent-name">
                                <h4><a href="agent-page.html">Jennie Wilson</a></h4>
                                <span>Agent In New York</span>
                            </div>

                            <ul class="agent-contact-details">
                                <li><i class="sl sl-icon-call-in"></i>(123) 123-456</li>
                                <li><i class="fa fa-envelope-o "></i><a href="#">jennie@example.com</a></li>
                            </ul>

                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- Agent / End -->


                <!-- Agent -->
                <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="agent">

                        <div class="agent-avatar">
                            <a href="agent-page.html">
                                <img src="/images/agent-03.jpg" alt="">
                                <span class="view-profile-btn">View Profile</span>
                            </a>
                        </div>

                        <div class="agent-content">
                            <div class="agent-name">
                                <h4><a href="agent-page.html">David Strozier</a></h4>
                                <span>Agent In Chicago</span>
                            </div>

                            <ul class="agent-contact-details">
                                <li><i class="sl sl-icon-call-in"></i>(123) 123-456</li>
                                <li><i class="fa fa-envelope-o "></i><a href="#">david@example.com</a></li>
                            </ul>

                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- Agent / End -->


                <!-- Agent -->
                <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="agent">

                        <div class="agent-avatar">
                            <a href="agent-page.html">
                                <img src="/images/agent-04.jpg" alt="">
                                <span class="view-profile-btn">View Profile</span>
                            </a>
                        </div>

                        <div class="agent-content">
                            <div class="agent-name">
                                <h4><a href="agent-page.html">Charles Watson</a></h4>
                                <span>Agent In Dallas</span>
                            </div>

                            <ul class="agent-contact-details">
                                <li><i class="sl sl-icon-call-in"></i>(123) 123-456</li>
                                <li><i class="fa fa-envelope-o "></i><a href="#">charles@example.com</a></li>
                            </ul>

                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- Agent / End -->


            </div>
            <!-- Agents Container / End -->
        </div>

    </div>
    <!-- Agents Section / End -->


    <section class="fullwidth border-top margin-top-40 margin-bottom-0 padding-top-60 padding-bottom-65"
             data-background-color="#ffffff">
        <!-- Logo Carousel -->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-40 margin-top-10">Companies We've Worked With <span>We can assist you with your innovation or commercialisation journey!</span>
                    </h3>
                </div>

                <!-- Carousel -->
                <div class="col-md-12">
                    <div class="logo-carousel dot-navigation">

                        <div class="item">
                            <img src="images/logo-01.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-02.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-03.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-04.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-05.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-06.png" alt="">
                        </div>

                        <div class="item">
                            <img src="images/logo-07.png" alt="">
                        </div>


                    </div>
                </div>
                <!-- Carousel / End -->

            </div>
        </div>
        <!-- Logo Carousel / End -->
    </section>


    <!-- Footer
    ================================================== -->

    @include('layouts.footer')

    <!-- Footer / End -->


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="/scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/scripts/jquery-migrate-3.1.0.min.js"></script>
    <script type="text/javascript" src="/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="/scripts/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/scripts/rangeSlider.js"></script>
    <script type="text/javascript" src="/scripts/sticky-kit.min.js"></script>
    <script type="text/javascript" src="/scripts/slick.min.js"></script>
    <script type="text/javascript" src="/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="/scripts/masonry.min.js"></script>
    <script type="text/javascript" src="/scripts/custom.js"></script>


</div>
<!-- Wrapper / End -->


</body>
</html>
