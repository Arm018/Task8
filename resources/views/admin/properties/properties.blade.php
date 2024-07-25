@include('admin.layouts.header')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Properties</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Properties</li>
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
                            <h3 class="card-title">Properties</h3>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('admin.properties.search') }}" class="mb-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Area</th>
                                            <th>Rooms</th>
                                            <th>Location</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        <tr>
                                            <th><input type="text" name="search_id" class="form-control form-control-sm"
                                                       placeholder="ID"
                                                       value="{{ request()->get('search_id') }}"></th>
                                            <th><input type="text" name="search_title"
                                                       class="form-control form-control-sm" placeholder="Title"
                                                       value="{{ request()->get('search_title') }}"></th>
                                            <th>
                                                <select name="search_status" class="form-control form-control-sm">
                                                    <option
                                                        value="" {{ request()->get('search_status') === null ? 'selected' : '' }}>
                                                        All Status
                                                    </option>
                                                    @foreach(\App\Models\Property::STATUSES as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{request()->get('search_status') === $key ? 'selected' : '' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <select name="search_type" class="form-control form-control-sm">
                                                    <option
                                                        value="" {{ request()->get('search_type') === null ? 'selected' : '' }}>
                                                        All Types
                                                    </option>
                                                    @foreach(\App\Models\Property::TYPES as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{request()->get('search_type') === $key ? 'selected' : '' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th><input type="text" name="search_price"
                                                       class="form-control form-control-sm" placeholder="Price"
                                                       value="{{ request()->get('search_price') }}"></th>
                                            <th><input type="text" name="search_area"
                                                       class="form-control form-control-sm" placeholder="Area"
                                                       value="{{ request()->get('search_area') }}"></th>
                                            <th><input type="text" name="search_rooms"
                                                       class="form-control form-control-sm" placeholder="Rooms"
                                                       value="{{ request()->get('search_rooms') }}"></th>
                                            <th><input type="text" name="search_location"
                                                       class="form-control form-control-sm" placeholder="Location"
                                                       value="{{ request()->get('search_location') }}"></th>
                                            <th><input type="date" name="search_date"
                                                       class="form-control form-control-sm"
                                                       value="{{ request()->get('search_created_at') }}"></th>
                                            <th>
                                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($properties as $property)
                                            <tr>
                                                <td>{{ $property->id }}</td>
                                                <td>{{ $property->title }}</td>
                                                <td>{{ \App\Models\Property::STATUSES[$property->status] }}</td>
                                                <td>{{ \App\Models\Property::TYPES[$property->type] }}</td>
                                                <td>${{ $property->price }}</td>
                                                <td>{{ $property->area }} Sq Ft</td>
                                                <td>{{ $property->rooms }}</td>
                                                <td>{{$property->address}} {{ $property->city }}
                                                    , {{ $property->state }} {{ $property->zip_code }}</td>
                                                <td>{{ $property->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.properties.edit', $property->id) }}"
                                                       class="btn btn-primary btn-sm">Edit</a>
                                                    <form
                                                        action="{{ route('admin.properties.destroy', $property->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                        </div>
                        <!-- Pagination Links -->
                        <div class="card-footer clearfix">
                            <div class="float-right">
                                {{ $properties->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this property? This action cannot be undone.');
    }
</script>

@include('admin.layouts.footer')
