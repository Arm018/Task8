<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Findeo</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


    <!-- Banner
    ================================================== -->
    <div class="parallax" data-background="/images/home-parallax.jpg" data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Main Search Container -->
                        <div class="main-search-container">
                            <h2>Find Your Dream Home</h2>

                            <!-- Main Search -->
                            <form class="main-search-form" action="{{route('search')}}" method="get">
                                <input type="hidden" name="view" value="list">
                                <!-- Type -->
                                <div class="search-type">
                                    <label class="active"><input class="first-tab" name="tab" checked="checked" type="radio">Any Status</label>
                                    <label><input name="tab" type="radio">For Sale</label>
                                    <label><input name="tab" type="radio">For Rent</label>
                                    <div class="search-type-arrow"></div>
                                </div>


                                <!-- Box -->
                                <div class="main-search-box">

                                    <!-- Main Search Input -->
                                    <div class="main-search-input larger-input">
                                        <input type="text" name="address" class="ico-01" id="autocomplete-input" placeholder="Enter address e.g. street, city and state or zip" value=""/>
                                        <button class="button">Search</button>
                                    </div>

                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <!-- Property Type -->
                                        <div class="col-md-4">
                                            <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                                <option value="">Any Type</option>
                                                @foreach ($propertyTypes as $key => $type)
                                                    <option value="{{ $key }}">{{ $type }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-4">

                                            <!-- Select Input -->
                                            <div class="select-input">
                                                <input type="number" name="min_price" placeholder="Min Price" data-unit="USD">
                                            </div>
                                            <!-- Select Input / End -->

                                        </div>


                                        <!-- Max Price -->
                                        <div class="col-md-4">

                                            <!-- Select Input -->
                                            <div class="select-input">
                                                <input type="number" name="max_price" placeholder="Max Price" data-unit="USD">
                                            </div>
                                            <!-- Select Input / End -->

                                        </div>

                                    </div>
                                    <!-- Row / End -->


                                    <!-- More Search Options -->
                                    <a href="#" class="more-search-options-trigger" data-open-title="More Options" data-close-title="Less Options"></a>

                                    <div class="more-search-options">
                                        <div class="more-search-options-container">

                                            <!-- Row -->
                                            <div class="row with-forms">

                                                <!-- Min Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <input type="number" name="min_area" placeholder="Min Area" data-unit="Sq Ft">
                                                    </div>
                                                    <!-- Select Input / End -->

                                                </div>

                                                <!-- Max Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <input type="number" name="max_area" placeholder="Max Area" data-unit="Sq Ft">
                                                    </div>
                                                    <!-- Select Input / End -->

                                                </div>

                                            </div>
                                            <!-- Row / End -->


                                            <!-- Row -->
                                            <div class="row with-forms">

                                                <!-- Min Area -->
                                                <div class="col-md-6">
                                                    <select name="beds" data-placeholder="Beds" class="chosen-select-no-single">
                                                        <option value="">Beds (Any)</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                                <!-- Max Area -->
                                                <div class="col-md-6">
                                                    <select name="baths" data-placeholder="Baths" class="chosen-select-no-single">
                                                        <option value="">Baths (Any)</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <!-- Row / End -->


                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">

                                                <input id="check-2" type="checkbox" name="air_conditioning">
                                                <label for="check-2">Air Conditioning</label>

                                                <input id="check-3" type="checkbox" name="swimming_pool">
                                                <label for="check-3">Swimming Pool</label>

                                                <input id="check-4" type="checkbox" name="central_heating" >
                                                <label for="check-4">Central Heating</label>

                                                <input id="check-5" type="checkbox" name="laundry_room">
                                                <label for="check-5">Laundry Room</label>


                                                <input id="check-6" type="checkbox" name="gym">
                                                <label for="check-6">Gym</label>

                                                <input id="check-7" type="checkbox" name="alarm">
                                                <label for="check-7">Alarm</label>

                                                <input id="check-8" type="checkbox" name="window_covering">
                                                <label for="check-8">Window Covering</label>

                                            </div>
                                            <!-- Checkboxes / End -->

                                        </div>
                                    </div>
                                    <!-- More Search Options / End -->


                                </div>
                                <!-- Box / End -->

                            </form>
                            <!-- Main Search -->

                        </div>
                        <!-- Main Search Container / End -->

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">
                    @foreach($properties as $property)
                    <div class="carousel-item" style="width: 340px;">
                        <div class="listing-item">

                            <a href="{{route('single.property',$property->id)}}" class="listing-img-container">

                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                    <span>{{$property->getStatusName()}}</span>
                                </div>

                                <div class="listing-img-content">
                                    @if($property->getStatusName() == 'For Sale')
                                    <span class="listing-price">${{$property->price}} <i>${{intval($property->price / $property->area)}} / sq ft</i></span>
                                    @else
                                    <span class="listing-price">${{$property->price}} <i>monthly</i></span>
                                    @endif
                                    <span class="like-icon bookmark-toggle {{ \Illuminate\Support\Facades\Auth::user()->favorites->contains('property_id', $property->id) ? 'bookmarked' : '' }}" data-tip-content="Add to Bookmarks" data-property-id="{{ $property->id }}">
                                            <i class="fa {{ \Illuminate\Support\Facades\Auth::user()->favorites->contains('property_id', $property->id) ? 'fa-star' : 'fa-star-o' }}"></i>
                                    </span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>

                                <div class="listing-carousel">
                                    @foreach($property->images as $image)
                                    <div><img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}" alt="" height="300"></div>
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
                    <!-- Listing Item / End -->
                    @endforeach





                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>



    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

        <!-- Box Headline -->
        <h3 class="headline-box">What are you looking for?</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Office"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Apartments</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Home-2"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Houses</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Car-3"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Garages</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Clothing-Store"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">For Sale</a>
                                <a href="listings-grid-standard-with-sidebar.html">For Rent</a>
                            </div>
                        </div>

                        <h3>Commercial</h3>
                        <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel felis.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


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
</div>
<!-- Wrapper / End -->
<script type="text/javascript" src="/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="/scripts/chosen.min.js"></script>
<script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="/scripts/slick.min.js"></script>
<script type="text/javascript" src="/scripts/masonry.min.js"></script>
<script type="text/javascript" src="/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="/scripts/custom.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.like-icon.bookmark-toggle').forEach(span => {
            span.addEventListener('click', function() {
                const propertyId = this.getAttribute('data-property-id');
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/bookmark/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ property_id: propertyId })
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

</body>
</html>
