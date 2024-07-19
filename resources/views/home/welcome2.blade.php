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
   @include('layouts.header2')
    <!-- Header Container / End -->


    <!-- Banner
    ================================================== -->
    <div class="parallax" data-background="images/home-parallax-2.jpg" data-color="#36383e" data-color-opacity="0.5" data-img-width="2500" data-img-height="1600">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="search-container">

                        <!-- Form -->
                        <h2>Find New Home</h2>

                        <!-- Row With Forms -->
                        <form class="row with-forms" action="{{route('search')}}" method="get">

                            <!-- Property Type -->
                            <div class="col-md-3">
                                <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                    <option value="">Any Type</option>
                                    <option value="apartment">Apartments</option>
                                    <option value="house">Houses</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="garage">Garages</option>
                                    <option value="lot">Lots</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-3">
                                <select name="status" data-placeholder="Any Status" class="chosen-select-no-single">
                                    <option value="">Any Status</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Rent">For Rent</option>
                                </select>
                            </div>

                            <!-- Main Search Input -->
                            <div class="col-md-6">
                                <div class="main-search-input">
                                    <input type="text" name="address" placeholder="Enter address e.g. street, city or state" value=""/>
                                    <button class="button" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </form>
                        <!-- Row With Forms / End -->

                        <!-- Browse Jobs -->
                        <div class="adv-search-btn">
                            Need more search options? <a href="listings-list-full-width.html">Advanced Search</a>
                        </div>

                        <!-- Announce -->
                        <div class="announce">
                            We’ve 1000 properties for you!
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Content
    ================================================== -->
    <!-- Fullwidth Section -->
    <section class="fullwidth border-bottom margin-top-0 margin-bottom-0 padding-top-50 padding-bottom-50" data-background-color="#ffffff">

        <!-- Content -->
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box-1 alternative">

                        <div class="icon-container">
                            <i class="im im-icon-Checked-User"></i>
                        </div>

                        <h3>Agent Finder</h3>
                        <p>See who specializes in your area, has the most reviews and the right experience to meet your needs.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box-1 alternative">

                        <div class="icon-container">
                            <i class="im im-icon-Cloud-Computer"></i>
                        </div>

                        <h3>Modern Technology</h3>
                        <p>More than 10,000 customers buy or sell a home with us each year. We help people and homes find each together.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box-1 alternative">

                        <div class="icon-container">
                            <i class="im im-icon-Idea"></i>
                        </div>

                        <h3>Home Designs Ideas</h3>
                        <p>Our specialists can help you get started on that home project. Find paint colors, that perfect tile and more. </p>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Fullwidth Section / End -->


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

                            <a href="{{route('property.edit',$property->id)}}" class="listing-img-container">

                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                    <span>{{$property->getStatusName()}}</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-compact-title">{{$property->title}} <i>${{$property->price}}</i></span>

                                    <ul class="listing-hidden-content">
                                        <li>Area <span>{{$property->area}} sq ft</span></li>
                                        <li>Rooms <span>{{$property->rooms}}</span></li>
                                        <li>Beds <span>{{$property->details->bedrooms}}</span></li>
                                        <li>Baths <span>{{$property->details->bathrooms}}</span></li>
                                    </ul>
                                </div>
                                @foreach($property->images->take(1) as $image)
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}" style="height: 250px">
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
    <section class="fullwidth margin-top-105 margin-bottom-0 padding-bottom-80 padding-top-95" data-background-color="#f7f7f7">

        <!-- Box Headline -->
        <h3 class="headline-box">What Our Clients Say</h3>

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="testimonials-subtitle">We collect reviews from our customers so you can get an honest opinion of what an apartment is really like!</div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-box">
                        <div class="testimonial">Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.</div>
                        <div class="testimonial-author">
                            <img src="images/happy-client-01.jpg" alt="">
                            <h4>Jennie Wilson <span>Rented Apartment</span></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-box">
                        <div class="testimonial">Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.</div>
                        <div class="testimonial-author">
                            <img src="images/happy-client-02.jpg" alt="">
                            <h4>Thomas Smith <span>Bought House</span></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-box">
                        <div class="testimonial">Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.</div>
                        <div class="testimonial-author">
                            <img src="images/happy-client-03.jpg" alt="">
                            <h4>Robert Lindstrom <span>Sold Apartment</span></h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Fullwidth Section / End -->



    <!-- Parallax -->
    <div class="parallax margin-bottom-70"
         data-background="images/listings-parallax.jpg"
         data-color="#36383e"
         data-color-opacity="0.7"
         data-img-width="800"
         data-img-height="505">

        <!-- Infobox -->
        <div class="text-content white-font">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-sm-8">
                        <h2>It's your journey. We're here to help.</h2>
                        <p>We’re full-service, local agents who know how to find people and home each together. We use online tools with an unmatched search capability to make you smarter and faster.</p>
                        <a href="listings-list-with-sidebar.html" class="button margin-top-25">Get Started</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Infobox / End -->

    </div>
    <!-- Parallax / End -->



    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-10">Most Popular Places <span>Properties In Most Popular Places</span></h3>
            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-01.jpg">

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
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-02.jpg">
                    <div class="img-box-content visible">
                        <h4>Los Angeles</h4>
                        <span>24 Properties</span>
                    </div>
                </a>

            </div>

            <div class="col-md-8">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-03.jpg">
                    <div class="img-box-content visible">
                        <h4>San Francisco </h4>
                        <span>12 Properties</span>
                    </div>
                </a>

            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-04.jpg">
                    <div class="img-box-content visible">
                        <h4>Miami</h4>
                        <span>9 Properties</span>
                    </div>
                </a>

            </div>

        </div>
    </div>
    <!-- Container / End -->


    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-95 margin-bottom-0">

        <!-- Box Headline -->
        <h3 class="headline-box">Articles & Tips</h3>

        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-01.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">8 Tips to Help You Finding New Home</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-02.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">Bedroom Colors You'll Never Regret</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="images/blog-post-03.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">What to Do a Year Before Buying Apartment</a></h3>
                            <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

                            <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


    <!-- Flip banner -->
    <a href="listings-half-map-grid-standard.html" class="flip-banner parallax" data-background="images/flip-banner-bg.jpg" data-color="#274abb" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
        <div class="flip-banner-content">
            <h2 class="flip-visible">We help people and homes find each other</h2>
            <h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->



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
