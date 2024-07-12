@extends('layouts.app')
@section('content')

    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Add Property</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-page">
                    <div class="notification notice large margin-bottom-55">
                        <h4>Don't Have an Account?</h4>
                        <p>If you don't have an account you can create one by entering your email address in contact
                            details section. A password will be automatically emailed to you.</p>
                    </div>

                    <h3>Basic Information</h3>
                    <div class="submit-section">
                        <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <!-- Title -->
                            <div class="form">
                                <h5>Property Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air conditioned)"></i>
                                </h5>
                                <input class="search-field" type="text" name="title" value="{{ old('title') }}"/>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status and Type -->
                            <div class="row with-forms">
                                <div class="col-md-6">
                                    <h5>Status</h5>
                                    <select class="chosen-select-no-single" name="status">
                                        <option value="">Select Status</option>
                                        <option value="For Sale" {{ old('status') == 'For Sale' ? 'selected' : '' }}>For
                                            Sale
                                        </option>
                                        <option value="For Rent" {{ old('status') == 'For Rent' ? 'selected' : '' }}>For
                                            Rent
                                        </option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <h5>Type</h5>
                                    <select name="type" class="chosen-select-no-single">
                                        <option value="">Select Type</option>
                                        <option value="Apartment" {{ old('type') == 'Apartment' ? 'selected' : '' }}>
                                            Apartment
                                        </option>
                                        <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House
                                        </option>
                                        <option value="Commercial" {{ old('type') == 'Commercial' ? 'selected' : '' }}>
                                            Commercial
                                        </option>
                                        <option value="Garage" {{ old('type') == 'Garage' ? 'selected' : '' }}>Garage
                                        </option>
                                        <option value="Lot" {{ old('type') == 'Lot' ? 'selected' : '' }}>Lot</option>
                                    </select>
                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Price, Area, Rooms -->
                            <div class="row with-forms">
                                <div class="col-md-4">
                                    <h5>Price</h5>
                                    <div class="select-input disabled-first-option">
                                        <input type="text" name="price" data-unit="USD" value="{{ old('price') }}"/>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5>Area</h5>
                                    <div class="select-input disabled-first-option">
                                        <input type="text" name="area" data-unit="Sq Ft" value="{{ old('area') }}"/>
                                    </div>
                                    @error('area')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5>Rooms</h5>
                                    <select class="chosen-select-no-single" name="rooms">
                                        <option value="">Select Number of Rooms</option>
                                        <option value="1" {{ old('rooms') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rooms') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rooms') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rooms') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rooms') == '5' ? 'selected' : '' }}>5</option>
                                        <option
                                            value="More than 5" {{ old('rooms') == 'More than 5' ? 'selected' : '' }}>
                                            More than 5
                                        </option>
                                    </select>
                                    @error('rooms')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        <!--Gallery -->
                            <h3>Gallery</h3>
                            <div class="submit-section">
                                    <input type="file" class="dropzone" name="images[]" multiple>
                            </div>

                            <!-- Location -->
                            <h3>Location</h3>
                            <div class="submit-section">
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Address</h5>
                                        <input type="text" name="address" value="{{ old('address') }}"/>
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>City</h5>
                                        <input type="text" name="city" value="{{ old('city') }}"/>
                                        @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>State</h5>
                                        <input type="text" name="state" value="{{ old('state') }}"/>
                                        @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Zip-Code</h5>
                                        <input type="text" name="zip_code" value="{{ old('zip_code') }}"/>
                                        @error('zip_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Information -->
                            <h3>Detailed Information</h3>
                            <div class="submit-section">
                                <div class="form">
                                    <h5>Description</h5>
                                    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary"
                                              spellcheck="true">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-4">
                                        <h5>Building Age</h5>
                                        <select class="chosen-select-no-single" name="building_age">
                                            <option value="">Select Building Age</option>
                                            <option
                                                value="0 - 1 Years" {{ old('building_age') == '0 - 1 Years' ? 'selected' : '' }}>
                                                0 - 1 Years
                                            </option>
                                            <option
                                                value="0 - 5 Years" {{ old('building_age') == '0 - 5 Years' ? 'selected' : '' }}>
                                                0 - 5 Years
                                            </option>
                                            <option
                                                value="0 - 10 Years" {{ old('building_age') == '0 - 10 Years' ? 'selected' : '' }}>
                                                0 - 10 Years
                                            </option>
                                            <option
                                                value="0 - 20 Years" {{ old('building_age') == '0 - 20 Years' ? 'selected' : '' }}>
                                                0 - 20 Years
                                            </option>
                                            <option
                                                value="0 - 50 Years" {{ old('building_age') == '0 - 50 Years' ? 'selected' : '' }}>
                                                0 - 50 Years
                                            </option>
                                            <option
                                                value="50 + Years" {{ old('building_age') == '50 + Years' ? 'selected' : '' }}>
                                                50 + Years
                                            </option>
                                        </select>
                                        @error('building_age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Bedrooms</h5>
                                        <select class="chosen-select-no-single" name="bedrooms">
                                            <option value="">Select Number of Bedrooms</option>
                                            <option value="1" {{ old('bedrooms') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('bedrooms') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('bedrooms') == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('bedrooms') == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('bedrooms') == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('bedrooms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Bathrooms</h5>
                                        <select class="chosen-select-no-single" name="bathrooms">
                                            <option value="">Select Number of Bathrooms</option>
                                            <option value="1" {{ old('bathrooms') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('bathrooms') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('bathrooms') == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('bathrooms') == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('bathrooms') == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('bathrooms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <h5 class="margin-top-30">Other Features</h5>
                                <div class="checkboxes in-row margin-bottom-20">
                                    <input id="check-air-conditioning" type="checkbox" name="air_conditioning"
                                           value="1" {{ old('air_conditioning') ? 'checked' : '' }}>
                                    <label for="check-air-conditioning">Air Conditioning</label>

                                    <input id="check-swimming-pool" type="checkbox" name="swimming_pool"
                                           value="1" {{ old('swimming_pool') ? 'checked' : '' }}>
                                    <label for="check-swimming-pool">Swimming Pool</label>

                                    <input id="check-central-heating" type="checkbox" name="central_heating"
                                           value="1" {{ old('central_heating') ? 'checked' : '' }}>
                                    <label for="check-central-heating">Central Heating</label>

                                    <input id="check-laundry-room" type="checkbox" name="laundry_room"
                                           value="1" {{ old('laundry_room') ? 'checked' : '' }}>
                                    <label for="check-laundry-room">Laundry Room</label>

                                    <input id="check-gym" type="checkbox" name="gym"
                                           value="1" {{ old('gym') ? 'checked' : '' }}>
                                    <label for="check-gym">Gym</label>

                                    <input id="check-alarm" type="checkbox" name="alarm"
                                           value="1" {{ old('alarm') ? 'checked' : '' }}>
                                    <label for="check-alarm">Alarm</label>

                                    <input id="check-window-covering" type="checkbox" name="window_covering"
                                           value="1" {{ old('window_covering') ? 'checked' : '' }}>
                                    <label for="check-window-covering">Window Covering</label>
                                </div>
                            </div>

                            <!-- Contact Details -->
                            <h3>Contact Details</h3>
                            <div class="submit-section">
                                <div class="row with-forms">
                                    <div class="col-md-4">
                                        <h5>Name</h5>
                                        <input type="text" name="contact_name" value="{{ old('contact_name') }}"/>
                                        @error('contact_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>E-Mail</h5>
                                        <input type="text" name="contact_email" value="{{ old('contact_email') }}"/>
                                        @error('contact_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Phone</h5>
                                        <input type="text" name="contact_phone" value="{{ old('contact_phone') }}"/>
                                        @error('contact_phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="divider"></div>
                            <button type="submit" class="button preview margin-top-5 submit-all">Submit Property <i class="fa fa-arrow-circle-right"></i></button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/scripts/dropzone.js"></script>
    <script>
        $(".dropzone").dropzone({
            dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
        });
    </script>



@endsection


