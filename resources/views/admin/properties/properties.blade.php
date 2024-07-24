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
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Property Name</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Area</th>
                                    <th>Rooms</th>
                                    <th>Location</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->getStatusName() }}</td>
                                        <td>{{ $property->getTypeName() }}</td>
                                        <td>${{ $property->price }}</td>
                                        <td>{{ $property->area }} Sq Ft</td>
                                        <td>{{ $property->rooms }}</td>
                                        <td>{{$property->address}} {{ $property->city }}, {{ $property->state }} {{ $property->zip_code }}</td>
                                        <td>{{ $property->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
