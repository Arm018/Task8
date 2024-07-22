@extends('layouts.app')
@section('content')
    <!-- Search
================================================== -->
    <section class="search margin-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Title -->
                    <h3 class="search-title">Search</h3>

                    <!-- Form -->
                    <form class="main-search-box no-shadow" action="{{route('search')}}" method="get">
                        <input type="hidden" name="view" value="full">

                        <!-- Row With Forms -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-3">
                                <select name="status" data-placeholder="Any Status" class="chosen-select-no-single">
                                    <option value="">Any Status</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Rent">For Rent</option>
                                </select>
                            </div>

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

                            <!-- Main Search Input -->
                            <div class="col-md-6">
                                <div class="main-search-input">
                                    <input type="text" name="address" class="ico-01"
                                           placeholder="Enter address e.g. street, city and state or zip"
                                           value=""/>
                                    <button class="button">Search</button>
                                </div>
                            </div>

                        </div>
                        <!-- Row With Forms / End -->


                        <!-- Row With Forms -->
                        <div class="row with-forms">

                            <!-- Min Price -->
                            <div class="col-md-3">

                                <!-- Select Input -->
                                <div class="select-input disabled-first-option">
                                    <input type="number" name="min_area" placeholder="Min Area" data-unit="Sq Ft">
                                </div>
                                <!-- Select Input / End -->

                            </div>

                            <!-- Max Price -->
                            <div class="col-md-3">

                                <!-- Select Input -->
                                <div class="select-input disabled-first-option">
                                    <input type="number" name="max_area" placeholder="Max Area" data-unit="Sq Ft">

                                </div>
                                <!-- Select Input / End -->

                            </div>


                            <!-- Min Price -->
                            <div class="col-md-3">

                                <!-- Select Input -->
                                <div class="select-input disabled-first-option">
                                    <input type="number" name="min_price" placeholder="Min Price" data-unit="USD">
                                </div>
                                <!-- Select Input / End -->

                            </div>


                            <!-- Max Price -->
                            <div class="col-md-3">

                                <!-- Select Input -->
                                <div class="select-input disabled-first-option">
                                    <input type="number" name="max_price" placeholder="Max Price" data-unit="USD">
                                </div>
                                <!-- Select Input / End -->

                            </div>

                        </div>
                        <!-- Row With Forms / End -->


                        <!-- More Search Options -->
                        <a href="#" class="more-search-options-trigger margin-top-10" data-open-title="More Options" data-close-title="Less Options"></a>

                        <div class="more-search-options relative">
                            <div class="more-search-options-container">

                                <!-- Row With Forms -->
                                <div class="row with-forms">

                                    <!-- Age of Home -->
                                    <div class="col-md-3">
                                        <select name="age" data-placeholder="Age of Home" class="chosen-select-no-single" >
                                            <option value="">Age of Home (Any)</option>
                                            <option value="0 - 1 Years">0 - 1 Years</option>
                                            <option value="0 - 5 Years">0 - 5 Years</option>
                                            <option value="0 - 10 Years">0 - 10 Years</option>
                                            <option value="0 - 20 Years">0 - 20 Years</option>
                                            <option value="0 - 50 Years">0 - 50 Years</option>
                                            <option value="50 + Years">50 + Years</option>
                                        </select>
                                    </div>

                                    <!-- Rooms Area -->
                                    <div class="col-md-3">
                                        <select name="rooms" data-placeholder="Rooms" class="chosen-select-no-single" >
                                            <option value="">Rooms (Any)</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <!-- Min Area -->
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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
                                <!-- Row With Forms / End -->


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


                    </form>
                    <!-- Box / End -->
                </div>
            </div>
        </div>
    </section>



    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row fullwidth-layout">

            <div class="col-md-12">

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <form id="sortForm" method="GET" action="{{ route('order') }}">
                                    <input type="hidden" name="view" value="full">
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
                            <a href="#" class="grid-three"><i class="fa fa-th"></i></a>
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
                                @if($property->getStatusName() == 'For Sale')
                                    <span class="listing-price">${{$property->price}} <i>${{intval($property->price / $property->area)}} / sq ft</i></span>
                                @else
                                    <span class="listing-price">${{$property->price}} <i>monthly</i></span>
                                @endif
                                    @if (Auth::check())
                                        <span class="like-icon bookmark-toggle {{ Auth::user()->favorites->contains('property_id', $property->id) ? 'bookmarked' : '' }}" data-tip-content="Add to Bookmarks" data-property-id="{{ $property->id }}">
                                                    <i class="fa {{ Auth::user()->favorites->contains('property_id', $property->id) ? 'fa-star' : 'fa-star-o' }}"></i>
                                                </span>
                                    @else
                                        <span class="like-icon with-tip" data-tip-content="Log in to Bookmark"></span>
                                    @endif
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                            </div>

                            <div class="listing-carousel">
                                @foreach($property->images as $image)
                                <div><img src="{{\Illuminate\Support\Facades\Storage::url($image->image)}}" alt=""></div>
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

                                <a href="{{route('single.property',$property->id)}}" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li>{{$property->area}} sq ft</li>
                                <li>{{$property->bedrooms}} Bedroom</li>
                                <li>{{$property->rooms}} Rooms</li>
                                <li>{{$property->bathrooms}} Bathroom</li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> {{$property->user->name}}</a>
                                <span><i class="fa fa-calendar-o"></i> {{$property->created_at->diffForHumans()}}</span>
                            </div>

                        </div>

                    </div>
                    @endforeach
                    <!-- Listing Item / End -->


                </div>
                <!-- Listings Container / End -->

                <div class="clearfix"></div>
                <!-- Pagination -->
                <div class="col-6">
                    <span>{{$filteredProperties->links('vendor.pagination.bootstrap-4')}}</span>
                </div>
                <!-- Pagination / End -->

            </div>

        </div>
    </div>
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
@endsection
