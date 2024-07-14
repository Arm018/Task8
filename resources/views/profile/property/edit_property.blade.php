@extends('layouts.app')
@section('content')

    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Edit Property</h2>
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
                        <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Title -->
                            <div class="form">
                                <h5>Property Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air conditioned)"></i>
                                </h5>
                                <input class="search-field" type="text" name="title" value="{{ old('title', $property->title) }}"/>
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
                                        <option value="For Sale" {{ old('status', $property->status) == 'For Sale' ? 'selected' : '' }}>For Sale</option>
                                        <option value="For Rent" {{ old('status', $property->status) == 'For Rent' ? 'selected' : '' }}>For Rent</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <h5>Type</h5>
                                    <select name="type" class="chosen-select-no-single">
                                        <option value="">Select Type</option>
                                        <option value="Apartment" {{ old('type', $property->type) == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                        <option value="House" {{ old('type', $property->type) == 'House' ? 'selected' : '' }}>House</option>
                                        <option value="Commercial" {{ old('type', $property->type) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                        <option value="Garage" {{ old('type', $property->type) == 'Garage' ? 'selected' : '' }}>Garage</option>
                                        <option value="Lot" {{ old('type', $property->type) == 'Lot' ? 'selected' : '' }}>Lot</option>
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
                                        <input type="text" name="price" data-unit="USD" value="{{ old('price', $property->price) }}"/>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5>Area</h5>
                                    <div class="select-input disabled-first-option">
                                        <input type="text" name="area" data-unit="Sq Ft" value="{{ old('area', $property->area) }}"/>
                                    </div>
                                    @error('area')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5>Rooms</h5>
                                    <select class="chosen-select-no-single" name="rooms">
                                        <option value="">Select Number of Rooms</option>
                                        <option value="1" {{ old('rooms', $property->rooms) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rooms', $property->rooms) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rooms', $property->rooms) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rooms', $property->rooms) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rooms', $property->rooms) == '5' ? 'selected' : '' }}>5</option>
                                        <option value="More than 5" {{ old('rooms', $property->rooms) == 'More than 5' ? 'selected' : '' }}>More than 5</option>
                                    </select>
                                    @error('rooms')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Gallery -->
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
                                        <input type="text" name="address" value="{{ old('address', $property->address) }}"/>
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>City</h5>
                                        <input type="text" name="city" value="{{ old('city', $property->city) }}"/>
                                        @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>State</h5>
                                        <input type="text" name="state" value="{{ old('state', $property->state) }}"/>
                                        @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Zip-Code</h5>
                                        <input type="text" name="zip_code" value="{{ old('zip_code', $property->zip_code) }}"/>
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
                                    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{{ old('description', $property->description) }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-4">
                                        <h5>Building Age</h5>
                                        <select class="chosen-select-no-single" name="building_age">
                                            <option value="">Select Building Age</option>
                                            <option value="0 - 1 Years" {{ old('building_age', $property->building_age) == '0 - 1 Years' ? 'selected' : '' }}>0 - 1 Years</option>
                                            <option value="0 - 5 Years" {{ old('building_age', $property->building_age) == '0 - 5 Years' ? 'selected' : '' }}>0 - 5 Years</option>
                                            <option value="0 - 10 Years" {{ old('building_age', $property->building_age) == '0 - 10 Years' ? 'selected' : '' }}>0 - 10 Years</option>
                                            <option value="0 - 20 Years" {{ old('building_age', $property->building_age) == '0 - 20 Years' ? 'selected' : '' }}>0 - 20 Years</option>
                                            <option value="20+ Years" {{ old('building_age', $property->building_age) == '20+ Years' ? 'selected' : '' }}>20+ Years</option>
                                        </select>
                                        @error('building_age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Bedrooms</h5>
                                        <select class="chosen-select-no-single" name="bedrooms">
                                            <option value="">Select Number of Bedrooms</option>
                                            <option value="1" {{ old('bedrooms', $property->bedrooms) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('bedrooms', $property->bedrooms) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('bedrooms', $property->bedrooms) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('bedrooms', $property->bedrooms) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('bedrooms', $property->bedrooms) == '5' ? 'selected' : '' }}>5</option>
                                            <option value="More than 5" {{ old('bedrooms', $property->bedrooms) == 'More than 5' ? 'selected' : '' }}>More than 5</option>
                                        </select>
                                        @error('bedrooms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Bathrooms</h5>
                                        <select class="chosen-select-no-single" name="bathrooms">
                                            <option value="">Select Number of Bathrooms</option>
                                            <option value="1" {{ old('bathrooms', $property->bathrooms) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('bathrooms', $property->bathrooms) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('bathrooms', $property->bathrooms) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('bathrooms', $property->bathrooms) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="More than 4" {{ old('bathrooms', $property->bathrooms) == 'More than 4' ? 'selected' : '' }}>More than 4</option>
                                        </select>
                                        @error('bathrooms')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-4">
                                        <h5>Swimming Pool</h5>
                                        <select class="chosen-select-no-single" name="swimming_pool">
                                            <option value="">Does it have a swimming pool?</option>
                                            <option value="Yes" {{ old('swimming_pool', $property->swimming_pool) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('swimming_pool', $property->swimming_pool) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('swimming_pool')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Parking</h5>
                                        <select class="chosen-select-no-single" name="parking">
                                            <option value="">Does it have parking?</option>
                                            <option value="Yes" {{ old('parking', $property->parking) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('parking', $property->parking) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('parking')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Air Conditioning</h5>
                                        <select class="chosen-select-no-single" name="air_conditioning">
                                            <option value="">Does it have air conditioning?</option>
                                            <option value="Yes" {{ old('air_conditioning', $property->air_conditioning) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('air_conditioning', $property->air_conditioning) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('air_conditioning')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Other Features -->
                            <h3>Other Features</h3>
                            <div class="submit-section">
                                <div class="checkboxes in-row margin-bottom-20">
                                    <input id="check-2" type="checkbox" name="features[]" value="Fully Furnished" {{ in_array('Fully Furnished', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-2">Fully Furnished</label>

                                    <input id="check-3" type="checkbox" name="features[]" value="Sea View" {{ in_array('Sea View', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-3">Sea View</label>

                                    <input id="check-4" type="checkbox" name="features[]" value="Electricity Backup" {{ in_array('Electricity Backup', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-4">Electricity Backup</label>

                                    <input id="check-5" type="checkbox" name="features[]" value="Central Heating" {{ in_array('Central Heating', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-5">Central Heating</label>

                                    <input id="check-6" type="checkbox" name="features[]" value="Storage Room" {{ in_array('Storage Room', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-6">Storage Room</label>

                                    <input id="check-7" type="checkbox" name="features[]" value="Elevator" {{ in_array('Elevator', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-7">Elevator</label>

                                    <input id="check-8" type="checkbox" name="features[]" value="Alarm" {{ in_array('Alarm', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-8">Alarm</label>

                                    <input id="check-9" type="checkbox" name="features[]" value="Gym" {{ in_array('Gym', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-9">Gym</label>

                                    <input id="check-10" type="checkbox" name="features[]" value="Laundry Room" {{ in_array('Laundry Room', old('features', $property->features) ?? []) ? 'checked' : '' }}>
                                    <label for="check-10">Laundry Room</label>
                                </div>
                            </div>

                            <!-- Contact Details -->
                            <h3>Contact Details</h3>
                            <div class="submit-section">
                                <div class="row with-forms">
                                    <div class="col-md-4">
                                        <h5>Phone</h5>
                                        <input type="text" name="phone" value="{{ old('phone', $property->phone) }}"/>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Email</h5>
                                        <input type="text" name="email" value="{{ old('email', $property->email) }}"/>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Website <span>(optional)</span></h5>
                                        <input type="text" name="website" value="{{ old('website', $property->website) }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>
                            <button type="submit" class="button preview margin-top-5">Update Property <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    <!-- Content / End -->
@endsection