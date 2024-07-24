@include('admin.layouts.header')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Property</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Property</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Property</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.properties.update',$property->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Property Name</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $property->title) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        @foreach(App\Models\Property::STATUSES as $key => $value)
                                            <option value="{{ $key }}" {{ $property->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control" id="type" required>
                                        @foreach(App\Models\Property::TYPES as $key => $value)
                                            <option value="{{ $key }}" {{ $property->type == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $property->price) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <input type="number" name="area" class="form-control" id="area" value="{{ old('area', $property->area) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="rooms">Rooms</label>
                                    <input type="number" name="rooms" class="form-control" id="rooms" value="{{ old('rooms', $property->rooms) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $property->address) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $property->city) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" id="state" value="{{ old('state', $property->state) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{ old('zip_code', $property->zip_code) }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Property</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('admin.layouts.footer')
