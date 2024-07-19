@extends('layouts.app')
@section('content')
    <!-- Map
================================================== -->
    <div id="map-container">
        <div id="map">
            <!-- map goes here -->
        </div>

        <!-- Map Navigation -->
        <a href="#" id="scrollEnabling" title="Enable or disable scrolling on map">Enable Scrolling</a>
        <ul id="mapnav-buttons">
            <li><a href="#" id="prevpoint" title="Previous point on map">Prev</a></li>
            <li><a href="#" id="nextpoint" title="Next point on mp">Next</a></li>
        </ul>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">

            <div class="col-md-8">

                <!-- Main Search Input -->
                <form class="main-search-input margin-bottom-35" action="{{route('search')}}" method="get">
                    <input type="hidden" name="view" value="map">
                    <input type="text" name="address" class="ico-01"
                           placeholder="Enter address e.g. street, city and state or zip"
                           value=""/>
                    <button class="button">Search</button>
                </form>

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <form id="sortForm" method="GET" action="{{ route('order') }}">
                                    <input type="hidden" name="view" value="map">
                                    <select name="sort" data-placeholder="Default order" class="chosen-select-no-single"
                                            onchange="document.getElementById('sortForm').submit();">
                                        <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Default Order
                                        </option>
                                        <option
                                            value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                            Price Low to High
                                        </option>
                                        <option
                                            value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                            Price High to Low
                                        </option>
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                            Newest Properties
                                        </option>
                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                            Oldest Properties
                                        </option>
                                    </select>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Listings -->
                <div class="listings-container list-layout">

                    <!-- Listing Item -->
                    @foreach($filteredProperties as $property)
                        <div class="listing-item">

                            <a href="{{route('single.property',$property->id)}}" class="listing-img-container">

                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                    <span>{{$property->getStatusName()}}</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">${{$property->price}} <i>${{intval($property->price / $property->area)}} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>

                                <div class="listing-carousel">
                                    @foreach($property->images as $image)
                                        <div><img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}"
                                                  alt=""></div>
                                    @endforeach
                                </div>
                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="{{route('single.property',$property->id)}}">{{$property->title}}</a>
                                    </h4>
                                    <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"
                                       class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        {{$property->zip_code}}
                                        {{$property->address}}
                                        {{$property->city}},
                                        {{$property->state}}
                                    </a>

                                    <a href="{{route('single.property',$property->id)}}" class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li>{{$property->area}} sq ft</li>
                                    <li>{{$property->details->bedrooms}} Bedroom</li>
                                    <li>{{$property->rooms}} Rooms</li>
                                    <li>{{$property->details->bathrooms}} Bathroom</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> {{$property->user->name}}</a>
                                    <span><i
                                            class="fa fa-calendar-o"></i> {{$property->created_at->diffForHumans()}}</span>
                                </div>

                            </div>

                        </div>
                    @endforeach
                    <!-- Listing Item / End -->


                </div>
                <!-- Listings Container / End -->


                <!-- Pagination -->
                <div class="col-6">
                    <span>{{$filteredProperties->links('vendor.pagination.bootstrap-4')}}</span>
                </div>
                <!-- Pagination / End -->

            </div>


            <!-- Sidebar
            ================================================== -->
            <div class="col-md-4">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <form class="widget margin-bottom-40" action="{{route('search')}}" method="get">
                        <input type="hidden" name="view" value="map">
                        <h3 class="margin-top-0 margin-bottom-35">Find New Home</h3>

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Status -->
                            <div class="col-md-12">
                                <select name="status" data-placeholder="Any Status" class="chosen-select-no-single">
                                    <option value="">Any Status</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Rent">For Rent</option>
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Type -->
                            <div class="col-md-12">
                                <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                    <option value="">Any Type</option>
                                    <option value="apartment">Apartments</option>
                                    <option value="house">Houses</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="garage">Garages</option>
                                    <option value="lot">Lots</option>
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- States -->
                            <div class="col-md-12">
                                <select data-placeholder="All States" class="chosen-select" >
                                    <option>All States</option>
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Arizona</option>
                                    <option>Arkansas</option>
                                    <option>California</option>
                                    <option>Colorado</option>
                                    <option>Connecticut</option>
                                    <option>Delaware</option>
                                    <option>Florida</option>
                                    <option>Georgia</option>
                                    <option>Hawaii</option>
                                    <option>Idaho</option>
                                    <option>Illinois</option>
                                    <option>Indiana</option>
                                    <option>Iowa</option>
                                    <option>Kansas</option>
                                    <option>Kentucky</option>
                                    <option>Louisiana</option>
                                    <option>Maine</option>
                                    <option>Maryland</option>
                                    <option>Massachusetts</option>
                                    <option>Michigan</option>
                                    <option>Minnesota</option>
                                    <option>Mississippi</option>
                                    <option>Missouri</option>
                                    <option>Montana</option>
                                    <option>Nebraska</option>
                                    <option>Nevada</option>
                                    <option>New Hampshire</option>
                                    <option>New Jersey</option>
                                    <option>New Mexico</option>
                                    <option>New York</option>
                                    <option>North Carolina</option>
                                    <option>North Dakota</option>
                                    <option>Ohio</option>
                                    <option>Oklahoma</option>
                                    <option>Oregon</option>
                                    <option>Pennsylvania</option>
                                    <option>Rhode Island</option>
                                    <option>South Carolina</option>
                                    <option>South Dakota</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Utah</option>
                                    <option>Vermont</option>
                                    <option>Virginia</option>
                                    <option>Washington</option>
                                    <option>West Virginia</option>
                                    <option>Wisconsin</option>
                                    <option>Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Cities -->
                            <div class="col-md-12">
                                <select data-placeholder="All Cities" class="chosen-select" >
                                    <option>All Cities</option>
                                    <option>New York</option>
                                    <option>Los Angeles</option>
                                    <option>Chicago</option>
                                    <option>Brooklyn</option>
                                    <option>Queens</option>
                                    <option>Houston</option>
                                    <option>Manhattan</option>
                                    <option>Philadelphia</option>
                                    <option>Phoenix</option>
                                    <option>San Antonio</option>
                                    <option>Bronx</option>
                                    <option>San Diego</option>
                                    <option>Dallas</option>
                                    <option>San Jose</option>
                                </select>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Min Area -->
                            <div class="col-md-6">
                                <select name="beds" data-placeholder="Beds" class="chosen-select-no-single">
                                    <option label="blank"></option>
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
                                    <option label="blank"></option>
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

                        <br>

                        <!-- Area Range -->
                        <div class="range-slider">
                            <label>Area Range</label>
                            <div id="area-range" data-min="0" data-max="1500" data-unit="sq ft"></div>
                            <div class="clearfix"></div>
                        </div>

                        <br>

                        <!-- Price Range -->
                        <div class="range-slider">
                            <label>Price Range</label>
                            <div id="price-range" data-min="0" data-max="400000" data-unit="$"></div>
                            <div class="clearfix"></div>
                        </div>



                        <!-- More Search Options -->
                        <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30" data-open-title="Additional Features" data-close-title="Additional Features"></a>

                        <div class="more-search-options relative">

                            <!-- Checkboxes -->
                            <div class="checkboxes in-row">

                                <input id="check-2" type="checkbox" name="air_conditioning">
                                <label for="check-2">Air Conditioning</label>

                                <input id="check-3" type="checkbox" name="swimming_pool">
                                <label for="check-3">Swimming Pool</label>

                                <input id="check-4" type="checkbox" name="central_heating">
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
                        <!-- More Search Options / End -->

                        <button class="button fullwidth margin-top-30" type="submit">Search</button>


                    </form>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
    <script type="text/javascript" src="/scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/scripts/jquery-migrate-3.1.0.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="/scripts/infobox.min.js"></script>
    <script type="text/javascript" src="/scripts/markerclusterer.js"></script>
    <script type="text/javascript" src="/scripts/maps.js"></script>
@endsection
