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
            <h4>Compare Properties <div class="csm-mobile-trigger"></div></h4>

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
   @include('layouts.header')
    <!-- Header Container / End -->


    <!-- Map================================================== -->
    <div id="map-container" class="homepage-map margin-bottom-0">

        <div id="map">
            <!-- map goes here -->
        </div>

        <!-- Map Navigation -->
        <a href="#" id="scrollEnabling" title="Enable or disable scrolling on map">Enable Scrolling</a>
        <ul id="mapnav-buttons">
            <li><a href="#" id="prevpoint" title="Previous point on map">Prev</a></li>
            <li><a href="#" id="nextpoint" title="Next point on mp">Next</a></li>
        </ul>


        <!-- Main Search Container -->
        <div class="main-search-container">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Trigger Button -->
                        <a href="#" class="adv-search-btn button">Advanced Search <i class="fa fa-caret-up"></i></a>

                        <!-- Main Search -->
                        <form class="main-search-form">

                            <!-- Type -->
                            <div class="search-type" style="display: none;">
                                <label class="active"><input class="first-tab" name="tab" checked="checked" type="radio">Any Status</label>
                                <label><input name="tab" type="radio">For Sale</label>
                                <label><input name="tab" type="radio">For Rent</label>
                                <div class="search-type-arrow"></div>
                            </div>


                            <!-- Box -->
                            <div class="main-search-box">

                                <!-- Row With Forms -->
                                <div class="row with-forms">

                                    <!-- Status -->
                                    <div class="col-md-3 col-sm-6">
                                        <select data-placeholder="Any Status" class="chosen-select-no-single" >
                                            <option>Any Status</option>
                                            <option>For Sale</option>
                                            <option>For Rent</option>
                                        </select>
                                    </div>

                                    <!-- Property Type -->
                                    <div class="col-md-3 col-sm-6">
                                        <select data-placeholder="Any Type" class="chosen-select-no-single" >
                                            <option>Any Type</option>
                                            <option>Apartments</option>
                                            <option>Houses</option>
                                            <option>Commercial</option>
                                            <option>Garages</option>
                                            <option>Lots</option>
                                        </select>
                                    </div>

                                    <!-- Main Search Input -->
                                    <div class="col-md-6">
                                        <div class="main-search-input">
                                            <input type="text" placeholder="Enter address e.g. street, city or state" value=""/>
                                            <button class="button">Search</button>
                                        </div>
                                    </div>

                                </div>
                                <!-- Row With Forms / End -->


                                <!-- Row With Forms -->
                                <div class="row with-forms">

                                    <!-- Min Price -->
                                    <div class="col-md-3 col-sm-6">

                                        <!-- Select Input -->
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="Min Area" data-unit="Sq Ft">
                                            <select>
                                                <option>Min Area</option>
                                                <option>300</option>
                                                <option>400</option>
                                                <option>500</option>
                                                <option>700</option>
                                                <option>800</option>
                                                <option>1000</option>
                                                <option>1500</option>
                                            </select>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>

                                    <!-- Max Price -->
                                    <div class="col-md-3 col-sm-6">

                                        <!-- Select Input -->
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="Max Area" data-unit="Sq Ft">
                                            <select>
                                                <option>Max Area</option>
                                                <option>300</option>
                                                <option>400</option>
                                                <option>500</option>
                                                <option>700</option>
                                                <option>800</option>
                                                <option>1000</option>
                                                <option>1500</option>
                                            </select>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>


                                    <!-- Min Price -->
                                    <div class="col-md-3 col-sm-6">

                                        <!-- Select Input -->
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="Min Price" data-unit="USD">
                                            <select>
                                                <option>Min Price</option>
                                                <option>1 000</option>
                                                <option>2 000</option>
                                                <option>3 000</option>
                                                <option>4 000</option>
                                                <option>5 000</option>
                                                <option>10 000</option>
                                                <option>15 000</option>
                                                <option>20 000</option>
                                                <option>30 000</option>
                                                <option>40 000</option>
                                                <option>50 000</option>
                                                <option>60 000</option>
                                                <option>70 000</option>
                                                <option>80 000</option>
                                                <option>90 000</option>
                                                <option>100 000</option>
                                                <option>110 000</option>
                                                <option>120 000</option>
                                                <option>130 000</option>
                                                <option>140 000</option>
                                                <option>150 000</option>
                                            </select>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>


                                    <!-- Max Price -->
                                    <div class="col-md-3 col-sm-6">

                                        <!-- Select Input -->
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="Max Price" data-unit="USD">
                                            <select>
                                                <option>Max Price</option>
                                                <option>1 000</option>
                                                <option>2 000</option>
                                                <option>3 000</option>
                                                <option>4 000</option>
                                                <option>5 000</option>
                                                <option>10 000</option>
                                                <option>15 000</option>
                                                <option>20 000</option>
                                                <option>30 000</option>
                                                <option>40 000</option>
                                                <option>50 000</option>
                                                <option>60 000</option>
                                                <option>70 000</option>
                                                <option>80 000</option>
                                                <option>90 000</option>
                                                <option>100 000</option>
                                                <option>110 000</option>
                                                <option>120 000</option>
                                                <option>130 000</option>
                                                <option>140 000</option>
                                                <option>150 000</option>
                                            </select>
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>

                                </div>
                                <!-- Row With Forms / End -->

                            </div>
                            <!-- Box / End -->

                        </form>
                        <!-- Main Search -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Main Search Container / End -->

    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-60">For Sale</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">
                    @foreach($properties as $property)
                        @if($property->status == 'For Sale')
                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <div class="listing-item">

                            <a href="{{route('single.property',$property->id)}}" class="listing-img-container">

                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                    <span>{{$property->status}}</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">${{$property->price}}<i>${{intval($property->price / $property->area)}} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>

                                <div class="listing-carousel">
                                    @foreach($property->images as $image)
                                    <div><img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}" height="300" alt=""></div>
                                    @endforeach
                                </div>

                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="{{route('single.property',$property->id)}}">{{$property->title}}</a></h4>
                                    <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        {{$property->zip_code}}
                                        {{$property->address}}
                                        {{$property->city}},
                                        {{$property->state}}
                                    </a>
                                </div>

                                <ul class="listing-features">
                                    <li>Area <span>{{$property->area}} sq ft</span></li>
                                    <li>Bedrooms <span>{{$property->details->bedrooms}}</span></li>
                                    <li>Bathrooms <span>{{$property->details->bathrooms}}</span></li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> {{$property->user->name}}</a>
                                    <span><i class="fa fa-calendar-o"></i> {{$property->created_at->diffForHumans()}}</span>
                                </div>

                            </div>

                        </div>
                    </div>
                        @endif
                    <!-- Listing Item / End -->
                    @endforeach
                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>


    <!-- For Rent -->
    <section class="fullwidth margin-top-55 padding-top-65 padding-bottom-55" data-background-color="#f9f9f9">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline margin-bottom-25 margin-top-0">For Rent</h3>
                </div>

                <!-- Carousel -->
                <div class="col-md-12">
                    <div class="carousel">
                        @foreach($properties as $property)
                        <!-- Listing Item -->
                        @if($property->status == 'For Rent')
                        <div class="carousel-item">
                            <div class="listing-item">
                                <a href="{{route('single.property',$property->id)}}" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span>{{$property->status}}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-price">${{$property->price}} <i>monthly</i></span>
                                        <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                        <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                    </div>
                                    @foreach($property->images->take(1) as $image)
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}" height="300" alt="">
                                    @endforeach
                                </a>

                                <div class="listing-content">

                                    <div class="listing-title">
                                        <h4><a href="{{route('single.property',$property->id)}}">Meridian Villas</a></h4>
                                        <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{$property->zip_code}}
                                            {{$property->address}}
                                            {{$property->city}},
                                            {{$property->state}}
                                        </a>
                                    </div>

                                    <ul class="listing-features">
                                        <li>Area <span>{{$property->area}} sq ft</span></li>
                                        <li>Bedrooms <span>{{$property->details->bedrooms}}</span></li>
                                        <li>Bathrooms <span>{{$property->details->bathrooms}}</span></li>
                                    </ul>

                                    <div class="listing-footer">
                                        <a href="#"><i class="fa fa-user"></i> {{$property->user->name}}</a>
                                        <span><i class="fa fa-calendar-o"></i> {{$property->created_at->diffForHumans()}}</span>
                                    </div>

                                </div>
                                <!-- Listing Item / End -->

                            </div>
                        </div>
                        <!-- Listing Item / End -->
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Carousel / End -->

            </div>
        </div>
    </section>


    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-10">Get Exposure for Your Listings</h3>
            </div>

            <div class="col-md-12">
                <div class="pricing-container margin-top-40">

                    <!-- Plan #1 -->

                    <div class="plan">

                        <div class="plan-price">
                            <h3>Basic</h3>
                            <span class="value">Free</span>
                            <span class="period">Free of charge one standard listing active for 30 days</span>
                        </div>

                        <div class="plan-features">
                            <ul>
                                <li>One Listing</li>
                                <li>30 Days Availability</li>
                                <li>Standard Listing</li>
                                <li>Limited Support</li>
                            </ul>
                            <a class="button border" href="{{route('property.create')}}">Get Started</a>
                        </div>

                    </div>

                    <!-- Plan #3 -->
                    <div class="plan featured">

                        <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div>

                        <div class="plan-price">
                            <h3>Extended</h3>
                            <span class="value">$9.99</span>
                            <span class="period">One time fee for one listing, highlighted in the search results</span>
                        </div>
                        <div class="plan-features">
                            <ul>
                                <li>One Time Fee</li>
                                <li>One Listing</li>
                                <li>90 Days Availability</li>
                                <li>Featured In Search Results</li>
                                <li>24/7 Support</li>
                            </ul>
                            <a class="button" href="{{route('property.create')}}">Get Started</a>
                        </div>
                    </div>

                    <!-- Plan #3 -->
                    <div class="plan">

                        <div class="plan-price">
                            <h3>Professional</h3>
                            <span class="value">$19.99</span>
                            <span class="period">Monthly subscription for unlimited listings and availability</span>
                        </div>

                        <div class="plan-features">
                            <ul>
                                <li>Unlimited Listings</li>
                                <li>Unlimited Availability</li>
                                <li>Featured In Search Results</li>
                                <li>24/7 Support</li>
                            </ul>
                            <a class="button border" href="{{route('property.create')}}">Get Started</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Container / End -->



    <section class="fullwidth border-top margin-top-55 margin-bottom-0 padding-top-60 padding-bottom-65" data-background-color="#ffffff">
        <!-- Logo Carousel -->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-40 margin-top-10">Companies We've Worked With <span>We can assist you with your innovation or commercialisation journey!</span></h3>
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

    <!-- Maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="/scripts/infobox.min.js"></script>
    <script type="text/javascript" src="/scripts/markerclusterer.js"></script>
    <script type="text/javascript" src="/scripts/maps.js"></script>




</div>
<!-- Wrapper / End -->


</body>
</html>
